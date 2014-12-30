# download.phpmyfaq.de

This subdomain handles the downloads of phpMyFAQ releases from [phpMyFAQ](http://www.phpmyfaq.de).

## API endpoints

### download.phpmyfaq.de/filesize/&lt;version&gt;

Example JSON Response for version 2.8.18:

    {
    
        "2.8.18": "6.1"
    }
    
The value of the version key is the filesize of the .zip package in MBytes.
    

### download.phpmyfaq.de/info/&lt;version&gt;

Example JSON Response for version 2.8.18:

    {
    
        "version": "2.8.18",
        "zip": {
            "filesize": 6.1,
            "md5": "f3b3ee1925ec778d7fcad3e3846a48cd"
        },
        "tar.gz": {
            "filesize": 5.42,
            "md5": "84c82f328c973de0c850abd72e9586d3"
        }
    
    }
    
The value of the filesize are MBytes.
    
## License

Mozilla Public License 2.0, see LICENSE.md for more information.

Copyright (c) 2014 Thorsten Rinne