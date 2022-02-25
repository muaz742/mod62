# Mod62 API Branch

A branch of the Mod62 API.

## Usage

**API Url:**

```
https://mod62api.herokuapp.com/
```

**API Details:**

```json
{
  "welcome": "Mod62 Encoder/Decoder API",
  "methods": {
    "encode": {
      "description": "Encodes the given number to a string",
      "param": {
        "name": "girdi",
        "inputType": "number",
        "description": "The number to encode",
        "outputType": "string",
        "example": "/encode?girdi=46999"
      }
    },
    "decode": {
      "description": "Decodes the given string to a number",
      "param": {
        "name": "girdi",
        "inputType": "string",
        "description": "The string to decode",
        "outputType": "number",
        "example": "/decode?girdi=ba"
      }
    }
  }
}
```

## License
[GNU General Public License v3.0](https://choosealicense.com/licenses/gpl-3.0/)