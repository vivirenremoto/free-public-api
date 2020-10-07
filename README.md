# free-public-api
 
List of free simple APIs

1. [Get age by birthdate](https://free-public-api.herokuapp.com/age/?value=1986-06-02)
2. [Days left by date](https://vivirenremoto.com/public_api/days_left/?value=2020-12-31)
3. [Get your IP](https://free-public-api.herokuapp.com/ip/)
4. [Get your user agent](https://free-public-api.herokuapp.com/user_agent/)
5. [Get your country code](https://free-public-api.herokuapp.com/country/)
6. [Validate VIES](https://free-public-api.herokuapp.com/validate_vies/?value=LU20260743)
7. [Validate DNI](https://free-public-api.herokuapp.com/validate_dni/?value=65839957L)
8. [Validate CIF](https://free-public-api.herokuapp.com/validate_cif/?value=A62134341)
9. [Validate IBAN account](https://free-public-api.herokuapp.com/validate_iban/?value=ES6621000418401234567891)
10. [Validate email](https://free-public-api.herokuapp.com/validate_email/?value=account@domain.com)
11. [Get final redirection](https://free-public-api.herokuapp.com/final_redirect/?value=https://t.co/PAzsIQVNhg)
12. [Get latitude and longitude by address using Google Maps](https://free-public-api.herokuapp.com/geocode/?value=calle%20d%27ulla%2017%2C%20torroella%20de%20montgri&key=xxx)
13. [Convert text to audio (mp3) using IBM Watson](https://free-public-api.herokuapp.com/speech/?value=hola&voice=es-ES_EnriqueVoice)

**Parameters**

- format, default text [json|text]
- value, default null
- callback, default null
- key (if is required, /geocode/ requires a google maps api key)
- default, default value null

**Return response**

JSON format

[https://free-public-api.herokuapp.com/age/?value=1986-06-02&format=json](https://free-public-api.herokuapp.com/age/?value=1986-06-02&format=json)

```
{"result":34}
```

Javascript callback

https://free-public-api.herokuapp.com/age/?value=1986-06-02&callback=printAge

```
printAge(34)
```
