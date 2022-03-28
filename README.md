# Mod62

URL shortener algorithm.

## Installation

You must add this file in your project.

```
Mod62.php   // for PHP
Mod62.js    // for JavaScript
Mod62.py    // for Python
```

## Usage

*If you want test on your project use to [Mod62 API Branch](https://github.com/muaz742/mod62/tree/mod62api).*

```php
# for PHP
$mod62coder = new Mod62();          // Create new instance
echo $mod62coder->encode(46999);    // encode 46999 to mod62
echo $mod62coder->decode('ba');     // decode ba to 46999
```

```javascript
// for JavaScript
let mod62coder = new Mod62();       // Create new instance
mod62coder.girdi = 46999;
console.log(mod62coder.encode());   // encode 46999 to mod62
mod62coder.girdi = "ba";
console.log(mod62coder.decode());   // decode ba to 46999
```

```python
# for Python
mod62coder = Mod62()                # Create new instance
print(mod62coder.encode(46999))     # encode 46999 to mod62
print(mod62coder.decode("ba"))      # decode ba to 46999
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[GNU General Public License v3.0](https://choosealicense.com/licenses/gpl-3.0/)