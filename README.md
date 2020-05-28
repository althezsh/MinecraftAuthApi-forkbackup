# MineCraft Auth Api

Minecraft account authentication api

## API (GET request)

```
http://localhost/auth.php?email=<Mojang Account Email>&password=<password>
```

## Return Json 

MineCraft account verification fails to return json information

```json
{
    "status": "error",
    "msg": "账户或密码输入错误"
}
```

MineCraft account verification returns json information

```json
{
    "status": "success",
    "info": {
        "user": "",
        "regcountry": "",
        "selectedProfile": {
            "name": "",
            "id": ""
        },
        "availableProfiles": [
            {
                "name": "",
                "id": ""
            }
        ]
    }
}
```