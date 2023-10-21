#include <WiFi.h>
#include <HTTPClient.h>

// Puente acceso Wifi
const char* WIFI_SSID = "MEGACABLE_2.4G_EBC8";
const char* WIFI_PASSWORD = "J6T7e2M8J4T5D4Z7a2a2";
const char* serverURL = "http://192.168.1.5/CulTech/Esp/RegistroDatos";
const char* id_placa = "12345678";

void setup() {
  Serial.begin(115200);
  WiFi.begin(WIFI_SSID, WIFI_PASSWORD);

  while (WiFi.status() != WL_CONNECTED) {
    delay(1000);
    Serial.println("Conectando a la red WiFi...");
  }
  Serial.println("Conexión WiFi establecida.");
}

void loop() {
  while (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;
    http.begin(client, serverURL);

    http.addHeader("Content-Type", "application/x-www-form-urlencoded");

    Serial.println("Introduce los datos en el siguiente formato: id_placa=12345678&tem=20.8&humendad=90.6&stem=20.8&shumendad=100&luz=100&co2=100&altura=5");
    while (!Serial.available()) {
      // Espera a que se ingresen los datos desde el Monitor Serial
    }

    String data = Serial.readStringUntil('\n');

    int httpResponseCode = http.POST(data);

    if (httpResponseCode > 0) {
      Serial.print("Respuesta del servidor: ");
      Serial.println(httpResponseCode);

      String response = http.getString();
      Serial.println(response);
    } else {
      Serial.print("Error en la solicitud. Código de respuesta: ");
      Serial.println(httpResponseCode);
    }

    http.end();

    delay(60000); // Espera 60 segundos antes de enviar la siguiente solicitud POST
  }
}
