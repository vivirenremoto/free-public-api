# free-public-api
 
List of free simple APIs

1. [Get age by birthdate](https://free-public-api.herokuapp.com/age/?value=1986-06-02)
1. [Days left by date](https://free-public-api.herokuapp.com/days_left/?value=2020-12-31)
1. [Get your IP](https://free-public-api.herokuapp.com/ip/)
1. [Get your user agent](https://free-public-api.herokuapp.com/user_agent/)
1. [Get your country code](https://free-public-api.herokuapp.com/country/)
1. [Validate VIES](https://free-public-api.herokuapp.com/validate_vies/?value=LU20260743)
1. [Validate DNI](https://free-public-api.herokuapp.com/validate_dni/?value=65839957L)
1. [Validate CIF](https://free-public-api.herokuapp.com/validate_cif/?value=A62134341)
1. [Validate IBAN](https://free-public-api.herokuapp.com/validate_iban/?value=ES6621000418401234567891)
1. [Validate email](https://free-public-api.herokuapp.com/validate_email/?value=account@domain.com)
1. [Get final redirection](https://free-public-api.herokuapp.com/final_redirect/?value=https://t.co/PAzsIQVNhg)
1. [Get latitude and longitude by address using Google Maps](https://free-public-api.herokuapp.com/geocode/?value=calle%20d%27ulla%2017%2C%20torroella%20de%20montgri&key=xxx)
1. [Convert text to audio (mp3) using IBM Watson](https://free-public-api.herokuapp.com/speech/?value=hola&voice=es-ES_EnriqueVoice)
1. [Generate number](https://free-public-api.herokuapp.com/generate_number/?value=50-100)
1. [Generate hex color](https://free-public-api.herokuapp.com/generate_color/)
1. [Generate password](https://free-public-api.herokuapp.com/generate_password/?length=8)
1. [Generate avatar](https://free-public-api.herokuapp.com/generate_avatar/)
1. [Generate QR](https://free-public-api.herokuapp.com/generate_qr/?value=https://github.com/&size=200)

**Parameters**

- format, default text [json|text]
- value, default null
- callback, default null
- key (if is required, /geocode/ requires a google maps api key)
- default, default value false

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

**Using an API on Google Spreadsheets**
```
=IMPORTDATA("https://free-public-api.herokuapp.com/age/?value=1986-06-02")
```
