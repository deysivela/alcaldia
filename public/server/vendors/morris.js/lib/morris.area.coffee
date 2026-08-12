class Morris.Area extends Morris.Line
  # Initialise
  #
  areaDefaults = 
    fillOpacity: 'auto'
    behaveLikeLine: false
    return new Morris.Area(options) unless (@ instanceof Morris.Area)
    areaOptions = $.extend {}, areaDefaults, options
    @cumulative = not areaOptions.behaveLikeLine
      areaOptions.fillOpacity = if areaOptions.behaveLikeLine then .8 else 1
  # calculate series data point coordinates
  #
  calcPoints: ->
      row._x = @transX(row.x)
      total = 0
      row._y = for y in row.y
        if @options.behaveLikeLine
          @transY(y)
        else
          total += (y || 0)
          @transY(total)
      row._ymax = Math.max row._y...
  # draw the data series
  #
  # @private
  drawSeries: ->
    @seriesPoints = []
      range = [0..@options.ykeys.length-1]
    else
      range = [@options.ykeys.length-1..0]
    for i in range
      @_drawFillFor i
      @_drawLineFor i
      @_drawPointFor i
  _drawFillFor: (index) ->
    path = @paths[index]
      path = path + "L#{@transX(@xmax)},#{@bottom}L#{@transX(@xmin)},#{@bottom}Z"
      @drawFilledPath path, @fillForSeries(index)
  fillForSeries: (i) ->
    color = Raphael.rgb2hsl @colorFor(@data[i], i, 'line')
      color.h,
      if @options.behaveLikeLine then color.s * 0.9 else color.s * 0.75,
      Math.min(0.98, if @options.behaveLikeLine then color.l * 1.2 else color.l * 1.25))
  drawFilledPath: (path, fill) ->
    @raphael.path(path)
      .attr('fill-opacity', @options.fillOpacity)
      .attr('stroke', 'none')
