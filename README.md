![SF-Dev RenewableProducts Magento Plugin v4.1.0](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/header.png)

Renewable Products Magento Plugin v.4.1.0
=============================

This plugin is an official and stable version of the Renewable Products Magento extension. It bundles functionality to process Configurable Products renewals securely as well as send email notifications to your customers when they complete a successful purchase all in all allowing your end-users the ability to take advantage of the renewal special price previously setup by the site admin.

Don't worry about managing the renewals over the phone any more for each order, or trying to pull your hair by trying to figure out who needs to renew their licenses, this magento plugin will automatically add products individually from each end-user order to the magento Admin section under ‘Renewable Products’ where the renewable product manager will just keep track of new individual products with ‘renewable’ attributes as they flood in, and fill in the required blank areas, in order for your end-users to be flagged as to where they may renewal or what is the status of each renewable product license expiration time frame, all that, made possible by just making sure to properly configure your configurable products’ attributes once.

Features
--------
Current version features:

•	The ability to individually manage and have the flexibility to spot specific products based on purchase date, days left on the license expiration frame, product key, color code flags that let end-user know when and what actions to take, among a few other must haves.

![Customers Account My Renewables tab, where they can view and take action on-demand](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/caccgrid.png)

•	Email notifications on successful purchases
•	Renewal URL encryption keys, in order to prevent url abuse, with various security conditions and alerts.
•	Great Pagination in order to load as little, or as much data your end-user may dig thru, keeping in mind that pagination is in place in order to load data faster.

![Customers Account My Renewables tab Pagination, great future that speeds up data loding, and allows end-users to dig thru there continuous growing Renewable Products list](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/caccpager.png)

•	Automatic product gathering and displaying within admin panel under the ‘Renewable Products List’ tab, in order for the site / renewable products manager may take care of basics.
	Backend Features for Admin:

![Backend Admin Renewables Section for Site Admins](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/adminrrtab.png)

o	Robust Renewable Product List that includes, Filter by Customer ID, Pagination, Detailed Transaction data in grid fashion, Color Code with action status in order to use towards renewals campaigns, and an Edit button in order to manage Key Aspects of each product as they flood in.

![Renewable Products QE, where products from every customer containing renewable attributes will automatically show here, in order for site admins to take proper action based on product renewal nature and specs](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/admineditpanel.png)

o	Edit Input section allows all admins to Edit Data according to each product renewal aspects and expiration date, all fields are editable, but 2 that are reserved (Transaction#, Order#)

![Renewable Products Edit Input, where site admins edit a renewanle product based on its vendor specs and expiration time frame.](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/admineditinputchangespanel.png)

Magento Version Compatibility
-----------------------------

The plugin has been tested in Magento EE 1.8 and higher. Support is not guaranteed for untested versions.

Installation
------------

Clone the module using git clone --recursive git@github.com:sauloscf/Mage_RenewableProductsModule.git

Or Download zip and replicate all files on each file’s particular directory.

There is no custom installation for this plugin, just the default:

	Now, go to >Catalogs>Attributes>Manage Attributes and add 2 new Attributes with the exact information below for each one. 

The 2 new Attributes are:

First One:

    "renewing"
    
  !['renewing' attribute in order for the module to funcion correctly](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/renewingaatributeset.png)
  !['renewing' attribute configuration continues](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/renewingaatributesetcontinue.png)
  

![Second Attribute must be created](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/renewableaatributeset.png)
![Second attribute configuration continues](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/renewableaatributesetcontinue.png)

	After you have created the Products Attributes, go to >Catalog>Attributes>Manage Attribute Sets
    1.	Choose the Attribute Set to which you wish configuring products with the Renewable Products attribute.
    2.	Create a New Group(which will show within each product configuration panel, since and when the product belongs to the Attribute set being now configured) called "Renewable"
    3.	Drag and Drop the previously created Attributes to the new Attribute Set Group
    
 ![Attribute Sets must contain a new Attribute Group and Attributes added to it](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/Renewableattributeset.png)
![Adding previously created attributes under the newly created group which will show within Product Configuration](https://raw.githubusercontent.com/sauloscf/Mage_RenewableProductsModule/master/readme_files/Renewableattributesetaddingattribute.png)


	Clear Magento Cache, and keep in mind that you have to use ‘Use Flat Catalog Category’ and ‘Use Flat Catalog Product’ under >System>Configuration>Catalog tab>Frontend ->Dropdown menu> SAVE, reindex if needed

Inventory Notes
---------------
This version includes the following modules:
    •	SF_RenewableProducts
    
License
-------

Developed by [SF-Dev](http://www.linkedin.com/in/sferrera/). Available with  [BSD 3-Clause "New" or "Revised" license](http://opensource.org/licenses/BSD-3-Clause)

End

Please feel free to contact me @ sf@sjwebs.coffeecup.com for any questions

One final config for each renewable product with the special price, it is mandatory to have the following,

  1. Duplicate all Original Products that you want to configure special prices to
  2. As for the SKU, matain the original plus adding '-renewingproductonly' to the end of it
  3. For the URL Key add to the begging 'renewableprod-renewing-' plus what the original url key is
  4. on the Renewable tab within the Product configuration, Choose 'True' for Renewing and 'Yes' for Renewable
   
That is it, Good Luck, and please report any bugs, I'll try to get to them asap.  
