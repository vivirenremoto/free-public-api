# free-public-api
 
A bunch of APIs to solve small problems 

**Support this project**

[Paypal](https://paypal.me/miquelcamps)

**API Methods**

[https://free-public-api.herokuapp.com/](https://free-public-api.herokuapp.com/)

**GET Parameters**

- input, default null
- key (if is required, /geocode/ requires a google maps api key)
- default, default value false
- format [json|text], default text
- callback, default null
- spreadsheet, required value if you are using google spreadsheets

**Response**

JSON format

[https://free-public-api.herokuapp.com/age/?value=1986-06-02&format=json](https://free-public-api.herokuapp.com/age/?value=1986-06-02&format=json)

```
{
    "status":200,
    "result":34
}
```

Javascript callback

https://free-public-api.herokuapp.com/age/?value=1986-06-02&callback=printAge

```
printAge(34)
```

Error callback - missing api key

https://free-public-api.herokuapp.com/followers_youtube/?value=UC5ABuhKL2CIfTf54qTnTUhQ&key=&format=json

```
{
    "status":400,
    "error":"api key (youtube data) and valid billing account are required on https://console.cloud.google.com/apis/"
}
```

**Using a method on Google Spreadsheets**

```
=IMPORTDATA("https://free-public-api.herokuapp.com/age/?value=1986-06-02")
```

**Disclaimer**

Any method can be changed or renamed any time, so I dont recomended to use this for production purposes.
