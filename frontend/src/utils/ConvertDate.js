import DateObject from "react-date-object";
import gregorian from "react-date-object/calendars/gregorian";
import persian from "react-date-object/calendars/persian";
import persian_fa from "react-date-object/locales/persian_fa";

export function ConvertDate(date) {
  const result = new DateObject({
    date,
    format: "YYYY/MM/DD",
    calendar: persian,
    locale: persian_fa,
  })
    .convert(gregorian)
    .format("YYYY-MM-DD");

  return convertPersianNumbersToEnglish(result);
}

function convertPersianNumbersToEnglish(str) {
  return str.replace(/[۰-۹]/g, (d) => "۰۱۲۳۴۵۶۷۸۹".indexOf(d));
}
