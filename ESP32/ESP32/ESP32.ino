#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <DHT.h>
#include <DHT_U.h>

// Pines
#define SENSORDHT11 2

DHT dht(SENSORDHT11, DHT11);
float tem, humendad;

// Punte acceso Wifi
#define WIFI_SSID "MEGACABLE_2.4G_EBC8"
#define WIFI_PASSWORD "J6T7e2M8J4T5D4Z7a2a2"

WiFiClient client; 

void setup() {
  
  Serial.begin(115200);
  pinMode(5,OUTPUT);
  pinMode(16,OUTPUT);
  WiFi.begin (WIFI_SSID, WIFI_PASSWORD);
    
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
      
  Serial.println ("");
  Serial.println ("Se conectó al wifi!");
  Serial.println(WiFi.localIP());
  
  dht.begin();

}

void loop() {
  t = dht.readTemperature();
  h = dht.readHumidity(); 

  //Ejemplo de llamada de función
  //uploadRiego(valor);
  Serial.print("Humedad Ambiente: ");
  Serial.print(humendad);
  Serial.println("%");
  Serial.print("Temperature Ambiente: ");
  Serial.print(tem);
  Serial.println("°C ");
  delay(10000);
}


void uploadRiego(float Value) {
  Serial.print("uploadRiego -> ");
  Serial.println(Value);   
  String path = "riegos/"; 
  String Rig = String(Value, 2);
  FirebaseJson json;
  json.setDoubleDigits(3);
  json.add("litros", Rig);
  Firebase.pushJSON(firebaseData, path, json);
  Firebase.setInt(firebaseData, "/otros/bomba", 0); 
}
