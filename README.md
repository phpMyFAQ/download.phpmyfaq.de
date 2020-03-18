# download.phpmyfaq.de

This subdomain handles the downloads of phpMyFAQ releases from [phpMyFAQ](https://www.phpmyfaq.de).

## API endpoints

### download.phpmyfaq.de/filesize/&lt;version&gt;

Example JSON Response for version 3.0.1:

    {
    
        "3.0.1": "7.6"
    }
    
The value of the version key is the filesize of the .zip package in MBytes.
    

### download.phpmyfaq.de/info/&lt;version&gt;

Example JSON Response for version 3.0.1:

    {
    
        "version": "3.0.1",
        "zip": {
            "filesize": 7.6,
            "md5": "f3b3ee1925ec778d7fcad3e3846a48cd"
        },
        "targz": {
            "filesize": 6.82,
            "md5": "84c82f328c973de0c850abd72e9586d3"
        }
    
    }
    
The value of the file size are MBytes.
    
## License

Mozilla Public License 2.0, see LICENSE.md for more information.

Copyright &copy; 2014-2020 Thorsten Rinne