# validator

The javascript validation code is based on jQuery. The Validator is cross-browser and will give you the power to use future-proof input types such as ‘tel’, ‘email’, ‘number’, ‘date’, and ‘url’. I can sum this as a ‘template’ for creating web forms.
[DEMO PAGE](http://yaireo.github.io/validator)

-   Cross browser validation
-   Utilize new HTML5 types for unsupported browsers
-   Light-weight (10kb + comments)

## Validation types support

HTML5 offers a wide selection of input types. I saw no need to support them all, for example, a checkbox should not be validated as ‘required’ because why wouldn’t it be checked in the first place when the form is rendered?
For a full list of all the available Types, visit the working draft page.
These input types can be validated by the the JS for – `<input type='foo' name='bar' />`. (Support is synthesized)

-   Email
-   Password
-   Date
-   URL
-   File
-   Tel
-   Checkbox
-   Hidden – Hidden fields can also have the ‘required’ attribute
    The below form elements are also supported:
-   Select – Useing a ‘required’ class because there is no such attribute for ‘select’ element
-   Textarea

## Basic semantics

    <form action="" method="post" novalidate>
    	<fieldset>
    		<div class="item">
    				<span>Name</span>
    			</label>
    			<div class='tooltip help'>
    					<b></b>
    					<p>Name must be at least 2 words</p>
    				</div>
    			</div>
    		</div>
    		<div class="item">
    			<label>
    				<span>email</span>
    				<input name="email" required="required" type="email" />
    			</label>
    		</div>
         		...

### Explaining the DOM

First, obviously, there is a Form element with the novalidate attribute to make sure to disable the native HTML5 validations (which currently suck). proceeding it there is a Fieldset element which is not a must, but acts as a “binding” box for a group of fields that are under the same “category”. For bigger forms there are many times field groups that are visually separated from each other for example. Now, we treat every form field element the user interacts with, whatsoever, as an “item”, and therefor these “items” will be wraped with `<div class='item'>`. This isolation gives great powers.
Next, inside an item, there will typically be an input or select or something of the sort, so they are put inside a `<label>` element, to get rid of the (annoying) for attribute, on the label (which also require us to give an ID to the form field element), and now when a user clicks on the label, the field will get focused. great. Going back to the label’s text itself, we wrap it with a `<span>` to have control over it’s style.
The whole approach here is to define each form field (input, select, whatever) as much as possible with HTML5 attributes and also with custom attributes.
| Attribute | Purpose |
|----------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| required | Defines that this field should be validated (with JS by my implementation and not via native HTML5 browser defaults) |
| placeholder | Writes some placeholder text which usually describes the fields with some example input (not supported in IE8 and below) |
| pattern | Defines a pattern which the field is evaluated with. Available values are:<br>**numeric** - Allow only numbers<br>**alphanumeric** - Allow only numbers or letters. No special language characters<br>**phone** - Allow only numbers, spaces or dashes.<br><br>Alternatively, you may write your own custom regex here as well. |
| data-validate-words | Defines the minimum amount of words for this field |
| data-validate-length | Defines the length allowed for the field (after trim). Example value: `7,11` (field can only have 7 or 11 characters). you can add how many allowed lengths you wish |
| data-validate-minmax | For type `number` only. Defines the minimum and/or maximum value that can be in that field |

### Optional fields

There is also support for optional fields, which are not validated, unless they have a value. The support for this feature is done by adding a class “optional” to a form element. Note that this should not be done along side the “required” attribute.
The validator function holds a messages object called "message", which itself holds all the error messages being shown to the user for all sort of validation errors.
invalid : 'invalid input',
empty : 'please put something here',
min : 'input is too short',
max : 'input is too long',
number_min : 'too low',
number_max : 'too high',
url : 'invalid URL',
number : 'not a number',
email : 'email address is invalid',
email_repeat : 'emails do not match',
};
This object can be extended easily. The idea is to extend it with new keys which represent the name of the field you want the message to be linked to, and that custom message appear as the `general error` one. Default messages can be over-ride.
`validator.defaults.alerts = false;`

## Binding the validation to a form

###Usage example - validate on submit
A generic callback function using jQuery to have the form validated on the **Submit** event. You can also include your own personal validations before the **checkAll()** call.
$('form').submit(function(e){
e.preventDefault();
var submit = true;
// you can put your own custom validations below
// check all the rerquired fields
if( !validator.checkAll( $(this) ) )
submit = false;
if( submit )
this.submit();
return false;
})
###Usage example - validate on field blur event (out of focus)
Check every field once it looses focus (onBlur) event
$('form').on('blur', 'input[required]', validator.checkField);
The helper tooltips **&lt;div class='tooltip help'&gt;**, which work using pure CSS, are element which holds a small **'?'** icon and when hovered over with the mouse, reveals a text explaining what the field “item” is about or for example, what the allowed input format is.

## Classes

`validator.defaults.classes` object can be modified with these classes:
alert : 'alert', // call on the alert tooltip
bad : 'bad' // classes for bad input
I have a cool feature I wrote which I call “multifields”. These are fields which are often use as to input a credit card or a serial number, and are actually a bunch of input fields which are “connected” to each other, and treated as one. You can see it in the demo page, and it’s included in ‘multifield.js’ file.
