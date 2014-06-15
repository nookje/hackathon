<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_push_notification($notification)
{


exec('
curl -X POST \
  -H "X-Parse-Application-Id: CpUSe8X4hCFPRfUnpHdPSVlmNUWKp0JVLtv7sMRX" \
  -H "X-Parse-REST-API-Key: BBPu4xX8ukaBIfbN15GF0e5NFbdW2df0QchPYmRk" \
  -H "Content-Type: application/json" \
  -d \'{
        "channels": [
          "test"
        ],
        "data": {
          "alert": "' . $notification . '",
          "sound": "cheering.caf",
          "title": "Mets Score!"
        }
      }\' \
  https://api.parse.com/1/push
');

}
