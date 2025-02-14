# technion-ug-info-fetcher

A script to fetch and parse Technion UG courses information, to have it in an accessible format.

Inspired by [ug-data](https://github.com/elazarg/ug-data), but also fetches the course schedule information.

## Usage

For Windows, you can use [PHP for Windows](https://windows.php.net/download/) in command-line mode.

For Linux, you can refer to [this comment](https://github.com/michael-maltsev/technion-ug-info-fetcher/issues/1#issuecomment-1271321255) for installing PHP and the relevant dependencies.
Alternatively, use vscode's Dev Containers extention with the devcontainer defined for this repo.


Recommended usage:

`php courses_to_json.php --semester <semester> --verbose`
When using vscode's devcontainer, one can specify the semester in semester.env and run:
`bash ./run.sh`

Replace `<semester>` with the desired semester in the following format: `YYYYSS`, for example `201901` for a Winter 2019-2020 semester.

The result will be saved in a file named `courses_<semester>.json`.

Refer to the source code for other options.

## Example

An example of a course entry:

```json
{
   "general":{
      "פקולטה":"מדעי המחשב",
      "שם מקצוע":"מבוא לתכנות מערכות",
      "מספר מקצוע":"234122",
      "אתר הקורס":"קישור לאתר הקורס",
      "נקודות":"3",
      "הרצאה":"2",
      "תרגיל":"2",
      "מעבדה":"0",
      "סמינר\/פרויקט":"0",
      "סילבוס":"השלמות שפת C: רשומות, רשימות מקושרות, מודולים, ניהול זכרון, ניצול סביבת UNIX וכלי מערכת לבנית תוכנה: מערכת הקבצים, תהליכים, נהלי מערכת, ניהול גרסאות והידור נפרד. תכנות והנדסת תוכנה: ניתוח דרישות. שימוש חוזר, טיפוסי נתונים מופשטים. תכנות מבוסס עצמים, תבניות. מבוא ל- ++C.",
      "מקצועות קדם":"234117  או 234114  או 234111",
      "מקצועות צמודים":"234118",
      "מקצועות ללא זיכוי נוסף":"234121 094220 094219 044101",
      "עבור לסמסטר":"חורף 2016\/17(תשע\"ז) קיץ 2015\/16 (תשע\"ו)",
      "אחראים":"פרופ. גרשון אלבר",
      "הערות":"",
      "מועד א":"בתאריך 21.07.2017 יום ו",
      "מועד ב":"בתאריך 13.10.2017 יום ו",
      "מיקום":"חדרי בחינה\nמועדי וחדרי בחנים"
   },
   "schedule":[
      {
         "קבוצה":"11",
         "מס.":"10",
         "סוג":"הרצאה",
         "מרצה\/מתרגל":"דר. רן רובינשטיין",
         "יום":"ג",
         "שעה":"10:3 - 12:3",
         "בניין":"טאוב",
         "חדר":"2"
      },
      {
         "קבוצה":"11",
         "מס.":"11",
         "סוג":"תרגול",
         "מרצה\/מתרגל":"מר תומר גולני",
         "יום":"א",
         "שעה":"14:3 - 16:3",
         "בניין":"אולמן",
         "חדר":"213"
      },
      {
         "קבוצה":"12",
         "מס.":"10",
         "סוג":"הרצאה",
         "מרצה\/מתרגל":"דר. רן רובינשטיין",
         "יום":"ג",
         "שעה":"10:3 - 12:3",
         "בניין":"טאוב",
         "חדר":"2"
      },
      {
         "קבוצה":"12",
         "מס.":"12",
         "סוג":"תרגול",
         "מרצה\/מתרגל":"מר ישראל גוטר",
         "יום":"ב",
         "שעה":"12:3 - 14:3",
         "בניין":"טאוב",
         "חדר":"5"
      },
      ...
   ]
}
```
