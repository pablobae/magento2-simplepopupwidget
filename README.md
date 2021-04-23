# Simple Pop-up widget for Magento 2

___

![alt Simple Popup extension for Magento 2](https://raw.githubusercontent.com/pablobae/markdown-images/master/magento2-simplepopupwidget/magento2-simplepopupwidget-header.png?raw=true "Simple Popup Widget for Magento 2")

# Table of Contents

* [Description](#description)
* [Features](#features)
* [Installation](#installation)
* [Configuration](#configuration)
* [How to use](#how-to-use)
* [Developers](#developers)
* [Motivation](#motivation)
* [License](#licence)

## Description

___

This extension allows you to add popup windows on any Magento 2 frontend page.

## Features:

___

* easy installation and configuration
* ACL support
* popup content retrieved from CMS static blocks
* supports custom CSS styles
* Popup behaviour configurable
* Popups in any magento 2 page, category or product
* Internationalization support

## Installation

___

### Installation with composer
To install this extension with composer go to your project root folder and run the following command
```
composer require pablobae/magento2-simplepopupwidget
```

Once the extension package is installed, run this Magento commands:
```
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-files:deploy
php bin/magento cache:clean
php bin/magneto cache:flush
```
That's all!

### Installation manually
Go to the root folder of your Magento installation and run the following commands:

```
mkdir -p app/code/Pablobae
git clone https://github.com/pablobae/magento2-simplepopupwidget.git app/code/Pablobae/SimplePopupWidget
php bin/magento setup:upgrade
php bin/magento setup:di:compile
php bin/magento setup:static-content:deploy -f
php bin/magento cache:flush
php bin/magento cache:clean
php bin/magento module:enable Pablobae_SimplePopupWidget
 ```

## Configuration

___
Login into the Magento administrator panel and go to **Stores** > **Configuration** > **Pablobae** > **
SimplePopupWidget** page. In this page you can set default configuration of the extension. This configuration will be
applied to all popups. Some of these settings can also be configured by popup.

Go to **Module Status** section and set **Status** to **Enable** and save the changes.

## How to use

___

### 1. Create a CMS Content block

Login into the Magento administrator panel, go to **Content** > **Blocks** and add a new block clicking on the **Add New
Block** button

* Enable the block
* Enter a title
* Enter an identifier
* Add the content of your popup in the editor
* Save the block

### 2. Create the popup widget

Go to **Content** > **Widgets** and add a new widget clicking on the **Add Widget** button with these settings:

* **Type**: select **Simple PopUp**
* **Design Theme**: select your current theme and click the **Continue** button
* Add a value for **Widget Title**¡
* Assign the popup to **Store Views**
* Click the button **Add Layout Update**
* Select in the **Display on** dropdown the page where do you want to show the popup. You can add the popup on cms
  pages, product pages and categories. Just do your choice:
    * To show it in **CMS Pages**:
        * Select **All Pages** or **Specific pages**. If you have select **Specific pages** then you must also select
          your desired page
        * In the **Container** dropdown, select **Simple Popup Container**
    * To show it in **Products** pages:
        * Select **All Products** or any of the options of specific product types **Specific pages**.
        * Now, you can choose if you want that the popup will be shown on **All** products, or you can select **Specific
          Products**
        * In the **Container** dropdown, select **Simple Popup Container**
    * To show it in **Categories**:
        * Select **Non-anchor categories**
        * Now, you can choose if you want that the popup will be shown on **All** the categories, or you can select **Specific Categories**
         * In the **Container** dropdown, select **Simple Popup Container**
* Click now the **Widget Options** tab on the left side of the page
* Click the **Select Block...* button and select the block created previously
* If you want to add specific css styles to this popup then add a **Specific CSS Class** and implement in your css file
  your changes.
* If you want that all the popup container links to somewhere, select **Yes** in the **Add Link** dropdown and enter
  values for **URL** and **Link Text** (this is the text that appear when the pointer is over the link).
* **Save** your settings

### 3. Cache cleaning

Finally, clean Magento cache, and visit the page where you have configured your popup to be shown.

## ChangeLog
[CHANGELOG.md](CHANGELOG.md)

## Developers

___

* [Pablo Baenas](https://github.com/pablobae)

## Motivation

___

This Magento 2 extension aims to offer a popup quick and easy popup solution.

## Licence

___
[GNU General Public License, version 3 (GPLv3)](http://opensource.org/licenses/gpl-3.0)
