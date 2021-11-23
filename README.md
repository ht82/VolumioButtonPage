# Volumio Button Page

A simple website that offers very basic volumio plaback controls.

## But why?

Why add another interface, although Volumio already offers a very convenient UI?

I installed a volumio in the kids room, used to play children music or children audio books. I already installed some GPIO Buttons for basic playback controls (play/pause, skip) which are very appreciated by the kids and are in heavy use. The only thing missing is the possibility to change the content they want to listen to. The volumio UI is far too complicated and offers way too many options, including all libraries, radio stations and settings. Therefore I needed a simple UI, running on a simple outdated phone or tablet, which is fully operable by the kids (who in my case just start basic reading).

## What it does

It creates a html-page with a set of transport control buttons. Those buttons just call the [Rest API](https://volumio.github.io/docs/API/REST_API.html) for a [Volumio Audio Player](https://volumio.com/).

## Configuration files

The following files can be added to include contact data and data protection declaration:

* kontakt.txt
* dtnschtz.txt

Both files can/must contain html-Code.

## Technical restrictions

### https-issue

Most browsers don't send the controls to the volumio device if they call this interface from a server which has https enabled. Since most volumios have no https enabled they can not be reached via https. On opposite most modern browsers automatically upgrade every http-request to https, if called as an iframe from a https-enabled page (which absolutely makes sense from a security perspective). So there are a few options:

* setup the controls page on a server with https disabled or just put it to a local machine (recommended)
* enable https for your volumio (will need certificates and stuff, good luck)
* somehow force your browser to load unsecure content (not recommended)
