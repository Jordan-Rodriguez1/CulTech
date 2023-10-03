#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include "FirebaseESP8266.h"
#include <DHT.h>
#include <DHT_U.h>

// Pines
#define SENSORDHT11 2

DHT dht(SENSORDHT11, DHT11);
float t, h;
// Host servidor
#define FIREBASE_HOST "riegoiot-a1261-default-rtdb.firebaseio.com"
// Secretos de la base de datos
#define FIREBASE_AUTH "FdxPj9EvnEuHI4Y8kCDWFb4ofNTUyzkYGBJoGgmb"


// Punte acceso Wifi
#define WIFI_SSID "MEGACABLE_2.4G_EBC8"
#define WIFI_PASSWORD "J6T7e2M8J4T5D4Z7a2a2"

WiFiClient client; 
FirebaseData firebaseData;



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
    
  Firebase.begin(FIREBASE_HOST, FIREBASE_AUTH);
  dht.begin();

}

void loop() {
  t = dht.readTemperature();
  h = dht.readHumidity(); 
  uploadTemperatura(t,h);
  Firebase.getInt(firebaseData, "/otros/foco");
  Serial.println("Data= " + String(firebaseData.intData()));
  if(firebaseData.intData()==1)
  {
    digitalWrite(16,1);
      Serial.print("H1");
  }
  else{
    digitalWrite(16,0
    );
    Serial.print("H2");
  }
   Firebase.getInt(firebaseData, "/otros/bomba");
   Serial.println("Data= " + String(firebaseData.intData()));
  if(firebaseData.intData()==1)
  {
    Serial.print("Regando");
    digitalWrite(5,HIGH);
    Serial.print("A1");
    delay(17000);
    Serial.print("Regado");
    float valor = 0.5;
    uploadRiego(valor);
    digitalWrite(5,LOW);
    Serial.print("A2");
  }
  else{
    digitalWrite(5,LOW);
    Serial.print("No Regado");
  }
 
  Serial.print("Humidity: ");
  Serial.print(h);
  Serial.println("%");
  Serial.print("Temperature: ");
  Serial.print(t);
  Serial.println("°C ");
  delay(10000);
}


void uploadTemperatura(float value, float value2) {
        Serial.print("uploadTemperatura -> ");
        Serial.println(value);
        Serial.print("uploadHumedad -> ");
        Serial.println(value);     
        String path = "medidas/"; 
        String Temp = String(value, 2);
        String Hum = String(value2, 2);
        FirebaseJson json;
        json.setDoubleDigits(3);
        json.add("temperatura", Temp);
        json.add("humedad", Hum);
        Firebase.pushJSON(firebaseData, path, json); 
        Firebase.setString(firebaseData, "/fijos/A/temperatura", Temp); 
        Firebase.setString(firebaseData, "/fijos/A/humedad", Hum); 
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
