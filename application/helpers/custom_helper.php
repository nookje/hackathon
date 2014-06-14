<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function send_push_notification($notification)
{


exec('
curl -X POST \
  -H "X-Parse-Application-Id: IZrrJxhHFSWv7kAvWTAtB5uQ7so2vprbygzr5z2r" \
  -H "X-Parse-REST-API-Key: JqMMRaB9A1NHaVOHfGSbP9KybfF8Tn7Sx2nwBaQn" \
  -H "Content-Type: application/json" \
  -d \'{
        "channels": [
          ""
        ],
        "data": {
          "alert": "' . $notification . '",
          "badge": "Increment",
          "sound": "cheering.caf",
          "title": "Mets Score!"
        }
      }\' \
  https://api.parse.com/1/push
');

}
