# free-public-api
 
List of free simple APIs

1. [Get age by birthdate](https://free-public-api.herokuapp.com/age/?value=1986-06-02)
1. [Days left by date](https://free-public-api.herokuapp.com/days_left/?value=2020-12-31)
1. [Get your IP](https://free-public-api.herokuapp.com/ip/)
1. [Get your user agent](https://free-public-api.herokuapp.com/user_agent/)
1. [Get your country code](https://free-public-api.herokuapp.com/country/)
1. [Get latitude and longitude by address using Google Maps](https://free-public-api.herokuapp.com/geocode/?value=calle%20d%27ulla%2017%2C%20torroella%20de%20montgri&key=xxx)
1. [Get address by coordinates using Google Maps](https://free-public-api.herokuapp.com/reverse_geocode/?value=42.0412139,3.1251759&key=xxx)
1. [Get local time by time zone](https://free-public-api.herokuapp.com/local_time/?value=Europe/Madrid)
1. [Get gravatar](https://free-public-api.herokuapp.com/gravatar/?value=)
1. [Validate VIES](https://free-public-api.herokuapp.com/validate_vies/?value=LU20260743)
1. [Validate DNI](https://free-public-api.herokuapp.com/validate_dni/?value=65839957L)
1. [Validate CIF](https://free-public-api.herokuapp.com/validate_cif/?value=A62134341)
1. [Validate IBAN](https://free-public-api.herokuapp.com/validate_iban/?value=ES6621000418401234567891)
1. [Validate email](https://free-public-api.herokuapp.com/validate_email/?value=account@domain.com)
1. [Convert text to audio (mp3) using IBM Watson](https://free-public-api.herokuapp.com/speech/?value=hola&voice=es-ES_EnriqueVoice)
1. [Generate number](https://free-public-api.herokuapp.com/generate_number/?value=50-100)
1. [Generate hex color](https://free-public-api.herokuapp.com/generate_color/)
1. [Generate password](https://free-public-api.herokuapp.com/generate_password/?length=8)
1. [Generate avatar](https://free-public-api.herokuapp.com/generate_avatar/)
1. [Generate QR](https://free-public-api.herokuapp.com/generate_qr/?value=https://github.com/&size=200)
1. [Encode MD5](https://free-public-api.herokuapp.com/encode_md5/?value=string)
1. [Encode Base64](https://free-public-api.herokuapp.com/encode_base64/?value=string)
1. [Decode Base64](https://free-public-api.herokuapp.com/decode_base64/?value=c3RyaW5n)
1. [Search photo from pixabay](https://free-public-api.herokuapp.com/search_photo/?value=dog)
1. [Search video from pixabay](https://free-public-api.herokuapp.com/search_video/?value=london)
1. [SEO search volume from keyword surfer](https://free-public-api.herokuapp.com/seo_search_volume/?value=vestidos+de+novia&country=es)
1. [SEO keyword CPC from keyword surfer](https://free-public-api.herokuapp.com/seo_keyword_cpc/?value=vestidos+de+novia&country=es)
1. [Get final redirection](https://free-public-api.herokuapp.com/final_redirect/?value=https://t.co/PAzsIQVNhg)
1. [Get Pagespeed score](http://free-public-api.herokuapp.com/pagespeed_score/?value=https://github.com/&device=mobile&key=xxx)

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
