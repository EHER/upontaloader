#UpOntaLoader

This is a simple photo uploader with the intent to debug issues with [Apontador API](http://api.apontador.com.br/v2).

##How to Install

All you need is clone the repository and install dependencies using [Composer](http://getcomposer.org/doc/00-intro.md#installation-nix).

```bash
git clone git://github.com/EHER/upontaloader.git
cd upontaloader
curl -sS https://getcomposer.org/installer | php
php compose.phar install
```

##Using

To use Apontador API you must proceed with a Auth2 authentication flow. All of them will grant you an Access Token. This token will be used to upload photos to a place page.
Lets take as example a upload of a image named Dummy.jpg to Abul Kebab & Lounge's Page.

To get the placeId we can parse the place's url:

```url
http://www.apontador.com.br/local/sp/sao_paulo/construcao/C404641427620N620E/abul_kebab___lounge___sao_paulo.html
```
The nonsense part of the url is the id: C404641427620N620E

Thats all what we need!

```bash
bin/upontaloader upload path/to/Dummy.jpg C404641427620N620E --token=AccessTokenProvidedByOauthFlow
```

##Debugging

If is everything working fine, you will get a status code 202. Any other case, a [Guzzle](http://guzzlephp.org/) Exception will be displayed with status code, reason phrase and url.

Have fun!
