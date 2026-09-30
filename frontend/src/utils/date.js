import DateObject from "react-date-object";
import gregorian from "react-date-object/calendars/gregorian";
import persian from "react-date-object/calendars/persian";
import persian_fa from "react-date-object/locales/persian_fa";

export function toGregorian(date) {
  return new DateObject(date)
    .convert(gregorian)
    .format("YYYY-MM-DD")
    .replace(/[۰-۹]/g, (d) => "۰۱۲۳۴۵۶۷۸۹".indexOf(d));
}

export function toPersian(date) {
  return new DateObject({
    date,
    calendar: gregorian,
  })
    .convert(persian, persian_fa)
    .format("YYYY/MM/DD");
}
