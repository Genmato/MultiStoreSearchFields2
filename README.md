### This extension is for Magento 2.x (BETA)

The version that is compatible with Magento 1.x can be found at https://genmato.com/multistore-search-fields

How to install this extension via Composer
======================

add the following to the require section of your Magento 2 `composer.json` file

    "genmato/multistoresearchfields": "dev-master"

additionally add the following in the repository section

        "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Genmato/MultiStoreSearchFields.git"
        }
    ]

Make sure the JSON format of the file is still valid

run `composer update`

add the following to `app/etc/config.php`

    'Genmato_MultiStoreSearchFields'=>1


Configuration
======================

Updated the extension to allow you to select the store in the attribute 'Frontend Properties' tab. For the attributes that need to be available in a specific store you can select it here. If you want an attribute to be visible in all stores select 'All Store Views'.

![Attribute Configuration](http://s10.postimg.org/76bpi07u1/Screen_Shot_2015_01_10_at_08_31_28.png)

The result on the advanced search page:

![Advanced Search Form](http://s22.postimg.org/pkvvwe5i9/Screen_Shot_2015_01_10_at_08_31_37.png)