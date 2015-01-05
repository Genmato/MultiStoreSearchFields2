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