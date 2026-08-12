(($, window) ->
    defaults:
      rating: undefined
      max: 5
      readOnly: false
      emptyClass: 'fa fa-star-o'
      fullClass: 'fa fa-star'
      change: (e, value) ->
    constructor: ($el, options) ->
      @$el = $el
      @createStars()
      @syncRating()
      return if @options.readOnly
      @$el.on 'mouseover.starrr', 'a', (e) =>
      @$el.on 'mouseout.starrr', =>
      @$el.on 'click.starrr', 'a', (e) =>
        e.preventDefault()
      @$el.on 'starrr:change', @options.change
    getStars: ->
    createStars: ->
      @$el.append("<a href='#' />") for [1..@options.max]
    setRating: (rating) ->
      @options.rating = rating
      @$el.trigger('starrr:change', rating)
    getRating: ->
    syncRating: (rating) ->
      rating ||= @options.rating
      for i in [1..@options.max]
        $stars.
          eq(i - 1).
          removeClass(if rating >= i then @options.emptyClass else @options.fullClass).
          addClass(if rating >= i then @options.fullClass else @options.emptyClass)
  $.fn.extend starrr: (option, args...) ->
    @each ->
      if !data
        $(@).data 'starrr', (data = new Starrr($(@), option))
      if typeof option == 'string'
        data[option].apply(data, args)
) window.jQuery, window
