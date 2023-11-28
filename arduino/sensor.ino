#include <OneWire.h>
#include <DallasTemperature.h>
#include "WiFi.h"
#include "HTTPClient.h"

const char* wifiSSID = "SuaRedeWiFi";
const char* wifiPassword = "SuaSenhaWiFi";
const char* serverURL = "https://exemplo.com/api/sensor";

const int oneWirePin = 26;
OneWire oneWire(oneWirePin);
DallasTemperature sensors(&oneWire);

void setup() {
  Serial.begin(115200);
  sensors.begin();

  WiFi.begin(wifiSSID, wifiPassword);
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
  Serial.println("Conectado ao WiFi");
}

void loop() {
  sensors.requestTemperatures();
  float temperaturaCelsius = sensors.getTempCByIndex(0);

  if (isnan(temperaturaCelsius)) {
    Serial.println("Erro ao ler a temperatura!");
  } else {
    Serial.print("Temperatura: ");
    Serial.print(temperaturaCelsius);
    Serial.println("°C");

    if (WiFi.status() == WL_CONNECTED) {
      HTTPClient httpClient;
      httpClient.begin(serverURL);
      httpClient.addHeader("Content-Type", "application/x-www-form-urlencoded");

      String dadosHTTP = "codigo=123&valor=" + String(temperaturaCelsius);

      int codigoRespostaHTTP = httpClient.POST(dadosHTTP);

      if (codigoRespostaHTTP > 0) {
        Serial.print("Código de Resposta HTTP: ");
        Serial.println(codigoRespostaHTTP);
        String respostaHTTP = httpClient.getString();
        Serial.println(respostaHTTP);
      } else {
        Serial.print("Erro no código: ");
        Serial.println(codigoRespostaHTTP);
      }
      httpClient.end();
    } else {
      Serial.println("WiFi Desconectado");
    }
  }
  delay(2000);
}
