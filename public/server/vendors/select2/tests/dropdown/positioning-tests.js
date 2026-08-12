module('Dropdown - attachBody - positioning');
    assert.expect(4);
    var $ = require('jquery');
    var $parent = $('<div></div>');
    var container = new MockContainer();
    $parent.appendTo($('#qunit-fixture'));
    var Utils = require('select2/utils');
    var Options = require('select2/options');
    var AttachBody = require('select2/dropdown/attachBody');
    var DropdownAdapter = Utils.Decorate(Dropdown, AttachBody);
        dropdownParent: $parent
    }));
        $parent.children().length,
        1,
    );
    dropdown.bind(container, $container);
    dropdown.position($dropdown, $container);
    assert.equal(
        1,
        'The dropdown should not be placed until after it is opened'
    );
    dropdown._showDropdown();
    assert.equal(
        2,
    );
        $.contains($parent[0], $dropdown[0]),
    );
});
test('dropdown is positioned down with static margins', function (assert) {
    var $ = require('jquery');
    var $select = $('<select></select>');
    $parent.css({
        marginTop: '5px',
        marginLeft: '10px'
    });
    var $container = $('<span>test</span>');
    var container = new MockContainer();
    $parent.appendTo($('#qunit-fixture'));
    $container.appendTo($parent);
    var Utils = require('select2/utils');
    var Options = require('select2/options');
    var Dropdown = require('select2/dropdown');
    var DropdownAdapter = Utils.Decorate(Dropdown, AttachBody);
    var dropdown = new DropdownAdapter($select, new Options({
        dropdownParent: $parent
    }));
    var $dropdown = dropdown.render();
    assert.equal(
        $dropdown[0].style.top,
        0,
        'The drodpown should not have any offset before it is displayed'
    dropdown.bind(container, $container);
    dropdown.position($dropdown, $container);
    assert.ok(
        'The dropdown should be forced down'
    );
        $dropdown.css('top').substring(0, 2),
        $container.outerHeight() + 5,
    );
    assert.equal(
        '10px',
    );
});
test('dropdown is positioned down with absolute offsets', function (assert) {
    var $select = $('<select></select>');
    $parent.css({
        position: 'absolute',
        top: '10px',
        left: '5px'
    });
    var container = new MockContainer();
    $parent.appendTo($('#qunit-fixture'));
    $container.appendTo($parent);
    var Options = require('select2/options');
    var Dropdown = require('select2/dropdown');
    var AttachBody = require('select2/dropdown/attachBody');
    var DropdownAdapter = Utils.Decorate(Dropdown, AttachBody);
        dropdownParent: $parent
    }));
    var $dropdown = dropdown.render();
    assert.equal(
        $dropdown[0].style.top,
        'The drodpown should not have any offset before it is displayed'
    );
    dropdown.bind(container, $container);
    dropdown.position($dropdown, $container);
    dropdown._showDropdown();
    assert.ok(
        'The dropdown should be forced down'
    );
    assert.equal(
        $dropdown.css('top').substring(0, 2),
        $container.outerHeight(),
        'There should not be an extra top offset'
    );
    assert.equal(
        $dropdown.css('left'),
        'There should not be an extra left offset'
    );
