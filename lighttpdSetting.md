# mod\_rewrite設定 #
```
url.rewrite-once = (
  ".*\.(js|ico|gif|jpg|png|css|txt|ogg|jar)$" => "$0",
  ".*\?(.*)$" => "/index.php?$1",
  "" => "/index.php"
)
```

# mod\_expire設定 #
## 設定圖片、CSS的過期時間，提供瀏覽器做快取 ##
```
$HTTP["url"] =~ "^/template/" {
         expire.url = ( "" => "access 10 years" )
}
```