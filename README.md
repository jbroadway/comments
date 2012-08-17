# Comments

A reusable, embeddable comments component for the [Elefant CMS](http://www.elefantcms.com/).

To install, copy it into your apps folder and visit Tools > Comments in the Elefant
admin toolbar.

To embed comments into a view template, simply include the following:

```html
{! comments/embed?identifier=unique-identifier-here !}
```

If no identifier is provided, it will use the current page URL as the identifier for
all comments made on that page.

To configure moderation options, edit the file `apps/comments/conf/config.php`.
