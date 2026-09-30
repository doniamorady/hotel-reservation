import DatePickerModule from "react-multi-date-picker";
import persian from "react-date-object/calendars/persian";
import persian_fa from "react-date-object/locales/persian_fa";

const DatePicker = DatePickerModule.default;

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
          value={startDate}
          onChange={setStartDate}
          format="YYYY/MM/DD"
          inputClass="form-control"
        />
      </div>
    </div>
  );
}