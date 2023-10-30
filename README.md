# icecast-player-html5
### Responsive web player for Icecast streaming

Just a quick update of this old player. 
I needed it to work again for Icecast with just simple needs like getting some metadata.
I simplified it quite a bit so essentials features work, and it is now also lighter.
Has only been tested on Icecast 2.4.4.

Thanks to [@gsavio](https://github.com/gsavio) for the original dev.
Thanks to [@andreas5232](https://github.com/andreas5232) for add Icecast support.

![Responsive Web Player for Icecast](https://i.imgur.com/x2NP8K8.png)

## Required:
- Icecast >= 2.4.4
- PHP >= 5.3
- cURL

## Installation
- Just put the files in your server
- **Configure your player in the file *config.js* in the *root***
    - Set your streaming URL (without `/` in the end)
    - Set some custom images if needed

### HTML5 Player for Icecast stream with info like:
- Current song & artist
- Cover art of the current song ([iTunes API](https://affiliate.itunes.apple.com/resources/documentation/itunes-store-web-service-search-api/))
- Responsive design

## Keyboard Controls 
- `M` - mute/unmute
- `P` and `space` - play/pause
- `arrow up` and `arrow down` - increase/decrease volume
- `0 to 9` - volume percent
