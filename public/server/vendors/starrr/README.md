# starrr

## Requirements

## Usage

```html

```

$('.starrr').starrr()

### With an existing rating

```js
$(".starrr").starrr({});
```

### With more than 5 stars

$('.starrr').starrr({
})

````
### Read-only
```js
$('.starrr').starrr({
})
### Do something with the rating...
```js
$('.starrr').starrr({
  change: function(e, value){
    alert('new rating is ' + value)
})
Or if you prefer events:
```js
$('.starrr').on('starrr:change', function(e, value){
  alert('new rating is ' + value)
})
## Developing
- `npm install -g grunt-cli`
- Make changes in `src/`
- Run `grunt` to compile them
## License
MIT
````
