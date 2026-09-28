import DatePickerModule from "react-multi-date-picker";
import persian_fa from "react-date-object/locales/persian_fa";
import persianModule from "react-date-object/calendars/persian";
import DateObject from "react-date-object";

const persian = persianModule.default;
const DatePicker = DatePickerModule.default;

const today = new DateObject({
  calendar: persian,
  locale: persian_fa,
});

export default function DateSection({ label, startDate, setStartDate }) {
  return (
    <div className="col-12">
      <div className="d-flex flex-column">
        <label
          className="form-label text-dark fw-medium mb-2"
          style={{
            fontSize: "13px",
          }}
        >
          {label}
        </label>

        <DatePicker
          calendar={persian}
          locale={persian_fa}
          value={startDate || today}
          onChange={setStartDate}
          format="YYYY/MM/DD"
          inputClass="form-control"
        />
      </div>
    </div>
  );
}
