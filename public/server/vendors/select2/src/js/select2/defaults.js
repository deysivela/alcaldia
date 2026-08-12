define([
  'jquery',
  'require',
  './selection/single',
  './selection/placeholder',
  './selection/allowClear',
  './selection/search',
  './selection/eventRelay',
  './utils',
  './translation',
  './data/select',
  './data/array',
  './data/ajax',
  './data/tokenizer',
  './data/minimumInputLength',
  './data/maximumInputLength',
  './data/maximumSelectionLength',
  './dropdown',
  './dropdown/search',
  './dropdown/hidePlaceholder',
  './dropdown/infiniteScroll',
  './dropdown/minimumResultsForSearch',
  './dropdown/selectOnClose',
  './dropdown/closeOnSelect',
  './i18n/en'
], function ($, require,
             ResultsList,
             SingleSelection, MultipleSelection, Placeholder, AllowClear,
             SelectionSearch, EventRelay,
             SelectData, ArrayData, AjaxData, Tags, Tokenizer,
             MinimumInputLength, MaximumInputLength, MaximumSelectionLength,
             AttachBody, MinimumResultsForSearch, SelectOnClose, CloseOnSelect,
  function Defaults () {
    this.reset();
  Defaults.prototype.apply = function (options) {
    if (options.dataAdapter == null) {
      if (options.ajax != null) {
      } else if (options.data != null) {
        options.dataAdapter = ArrayData;
        options.dataAdapter = SelectData;
      }
      if (options.minimumInputLength > 0) {
        options.dataAdapter = Utils.Decorate(
          MinimumInputLength
        );
      if (options.maximumInputLength > 0) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          MaximumInputLength
        );
      }
      if (options.maximumSelectionLength > 0) {
        options.dataAdapter = Utils.Decorate(
          MaximumSelectionLength
        );
      }
      if (options.tags) {
        options.dataAdapter = Utils.Decorate(options.dataAdapter, Tags);
      }
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          Tokenizer
        );
      }
      if (options.query != null) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          Query
        );
      }
      if (options.initSelection != null) {
        options.dataAdapter = Utils.Decorate(
          options.dataAdapter,
          InitSelection
      }
    }
    if (options.resultsAdapter == null) {
      options.resultsAdapter = ResultsList;
      if (options.ajax != null) {
        options.resultsAdapter = Utils.Decorate(
          InfiniteScroll
        );
      if (options.placeholder != null) {
        options.resultsAdapter = Utils.Decorate(
          options.resultsAdapter,
          HidePlaceholder
        );
      if (options.selectOnClose) {
        options.resultsAdapter = Utils.Decorate(
          SelectOnClose
        );
      }
    }
    if (options.dropdownAdapter == null) {
      if (options.multiple) {
      } else {
        var SearchableDropdown = Utils.Decorate(Dropdown, DropdownSearch);
      }
      if (options.minimumResultsForSearch !== 0) {
        options.dropdownAdapter = Utils.Decorate(
          options.dropdownAdapter,
          MinimumResultsForSearch
        );
      if (options.closeOnSelect) {
        options.dropdownAdapter = Utils.Decorate(
          options.dropdownAdapter,
          CloseOnSelect
        );
      }
        options.dropdownCssClass != null ||
        options.dropdownCss != null ||
        options.adaptDropdownCssClass != null
      ) {
        var DropdownCSS = require(options.amdBase + 'compat/dropdownCss');
        options.dropdownAdapter = Utils.Decorate(
          options.dropdownAdapter,
        );
      }
      options.dropdownAdapter = Utils.Decorate(
        options.dropdownAdapter,
        AttachBody
    }
    if (options.selectionAdapter == null) {
        options.selectionAdapter = MultipleSelection;
      } else {
        options.selectionAdapter = SingleSelection;
      }
      // Add the placeholder mixin if a placeholder was specified
      if (options.placeholder != null) {
          options.selectionAdapter,
          Placeholder
        );
      }
      if (options.allowClear) {
        options.selectionAdapter = Utils.Decorate(
          AllowClear
        );
      }
      if (options.multiple) {
        options.selectionAdapter = Utils.Decorate(
          options.selectionAdapter,
        );
      }
      if (
        options.containerCssClass != null ||
        options.containerCss != null ||
      ) {
        var ContainerCSS = require(options.amdBase + 'compat/containerCss');
        options.selectionAdapter = Utils.Decorate(
          options.selectionAdapter,
          ContainerCSS
      }
      options.selectionAdapter = Utils.Decorate(
        options.selectionAdapter,
        EventRelay
      );
    }
      // Check if the language is specified with a region
      if (options.language.indexOf('-') > 0) {
        // Extract the region information if it is included
        var languageParts = options.language.split('-');
        var baseLanguage = languageParts[0];
        options.language = [options.language, baseLanguage];
      } else {
      }
    }
    if ($.isArray(options.language)) {
      var languages = new Translation();
      options.language.push('en');
      var languageNames = options.language;
        var name = languageNames[l];
        var language = {};
        try {
          // Try to load it with the original name
          language = Translation.loadPath(name);
        } catch (e) {
            // If we couldn't load it, check if it wasn't the full path
            name = this.defaults.amdLanguageBase + name;
            language = Translation.loadPath(name);
          } catch (ex) {
            // The translation could not be loaded at all. Sometimes this is
            // because of a configuration problem, other times this can be
            if (options.debug && window.console && console.warn) {
              console.warn(
                'Select2: The language file for "' + name + '" could not be ' +
                'automatically loaded. A fallback will be used instead.'
              );
            continue;
          }
        }
        languages.extend(language);
      }
    } else {
      var baseTranslation = Translation.loadPath(
        this.defaults.amdLanguageBase + 'en'
      );
      var customTranslation = new Translation(options.language);
      customTranslation.extend(baseTranslation);
    }
    return options;
  };
  Defaults.prototype.reset = function () {
    function stripDiacritics (text) {
      function match(a) {
        return DIACRITICS[a] || a;
      }
    }
      // Always return the object if there is nothing to compare
      if ($.trim(params.term) === '') {
        return data;
      // Do a recursive check for options with children
      if (data.children && data.children.length > 0) {
        // Clone the data object if there are children
        // This is required as we modify the object to remove any non-matches
        var match = $.extend(true, {}, data);
        // Check each child of the option
        for (var c = data.children.length - 1; c >= 0; c--) {
          var child = data.children[c];
          var matches = matcher(params, child);
          // If there wasn't a match, remove the object in the array
          if (matches == null) {
            match.children.splice(c, 1);
          }
        }
        // If any children matched, return the new object
        if (match.children.length > 0) {
          return match;
        }
        return matcher(params, match);
      }
      var original = stripDiacritics(data.text).toUpperCase();
      // Check if the text contains the term
      if (original.indexOf(term) > -1) {
      }
      // If it doesn't contain the term, don't return anything
      return null;
    }
    this.defaults = {
      amdBase: './',
      closeOnSelect: true,
      dropdownAutoWidth: false,
      escapeMarkup: Utils.escapeMarkup,
      matcher: matcher,
      minimumInputLength: 0,
      maximumSelectionLength: 0,
      minimumResultsForSearch: 0,
      selectOnClose: false,
      sorter: function (data) {
        return data;
      },
        return result.text;
      },
        return selection.text;
      },
      theme: 'default',
      width: 'resolve'
    };
  Defaults.prototype.set = function (key, value) {
    var camelKey = $.camelCase(key);
    var data = {};
    data[camelKey] = value;
    var convertedData = Utils._convertData(data);
  };
  var defaults = new Defaults();
  return defaults;
