# **SAS© Visual Analytics Table Editor**

***Tabulator4VA – v4.2.x***

**David Weik – david.weik@sas.com**

**SAS South Western Europe – Customer Advisory**

## Configuring a new report


1. Make sure that the data table has a unique numeric id column

2. Insure that the intended audience for the report has read and write access to the table

3. Write down the caslib and table name

4. Write down all column names that should be editable in the report + the id column

5. Create the VA-report and write down it's id (Details > More > URI > /reports/reports/**<URI>**) and the name of the report (To make life easier avoid blanks and special symbols except for underscore)

6. Change over to MobaXterm an open up the file: *<Install_Path>*/DataDriven/Tabulator4VA/VATableEditor.meta.ctrl.json and add this to the reports property

   ```json
   {
           "information": {
                   ...
           },
           "reports": {
                   "<URI>" : "ReportsDefinition/<Report-Name>.ctrl.json"
           }
   }
   ```

7. Now inside of *<Install_Path>*/DataDriven/Tabulator4VA/ReportsDefinition create a new file named <Report-Name>.ctrl.json

8. Take the following template and fill in the information gathered above

   ```json
   {
     "crtlInfo": {
       "version": 1,
       "creationDate": "<15Jan2021 08:53>",
       "createdBy": "<UserId>",
       "lastModifDate": "<15Jan2021 11:04>",
       "lastModifBy": "<UserId>"
     },
     "casServer": "<cas-shared-default>",
     "reportID": ["<Report-URI>"],
     "defaultBehaviour": "read-only",
     "trackChanges": true,
     "OnSaveMode": 1,
     "validUsers": {
       "groups": ["<Groupname>"],
       "users": ["<UserId>"]
     },
     "modules": {
       "cellChanges": true,
       "history": true,
       "saveChanges": true,
       "save2Disk": true,
       "addRows": true,
       "deleteRows": true,
       "updtColVal": true,
       "download": true,
       "downloadCSV": true,
       "downloadPDF": true,
       "downloadJSON": true,
       "downloadXLSX": true,
       "downloadHTML": true,
       "printing": true,
       "clipboard": true,
       "calculator": true,
       "logger": true
     },
     "notMappedColumnsDefaults": {
       "name": "unknown",
       "editable": false,
       "visible": true,
       "onDownload": true,
       "onPrint": true,
       "onClipboard": true,
       "calculator": false,
       "validation": {
         "required": false,
         "useFormula": null,
         "default": null,
         "min": null,
         "max": null,
         "minLength": null,
         "maxLength": null,
         "in": null,
         "starts": null,
         "ends": null,
         "regex": null
       }
     },
     "dataSources": [
       {
         "casLib": "<caslib>",
         "casTable": "<table>",
         "validateOnLoad": true,
         "trackChanges": true,
         "OnSaveMode": 2,
         "columnDefaults": {
           "primaryKey": false,
           "editable": true,
           "visible": true,
           "onDownload": true,
           "onPrint": true,
           "onClipboard": true,
           "calculator": true,
           "validation": {
             "required": true,
             "useFormula": null,
             "default": null,
             "min": null,
             "max": null,
             "minLength": null,
             "maxLength": null,
             "in": null,
             "starts": null,
             "ends": null,
             "regex": null
           }
         },
         "columns": [
           {
             "name": "<columnName>"
           },
           {
             "name": "<idColumn>",
             "primaryKey": true
           }
         ]
       }
     ]
   }
   ```

9. Now back in VA turn the id column into a primary key by first insuring that it is classified as categorial > right click > Set as unique identifier

10. Add a Data Driven Content (**DDC**) object to the report

11. Select the DDC and go to Options > Web Content > URL and paste the URL for the VATableEditor inside https://*<Web_Server>*/htmlcommons/DataDriven/Tabulator4VA/DDC_Tabulator4VA\*(2).html

12. On the Roles section add all the data that the VA Table Editor should display and don't forget the id column

13. For more customization see the chapter Setting Up the Control File > Control File / Definitions > **3. Based on a Metadata file: VATableEditor.meta.ctrl.json** in Tabulator4VA_TechnicalManual_(x).pdf

    
