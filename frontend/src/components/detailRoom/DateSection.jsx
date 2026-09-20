import DatePickerModule from "react-multi-date-picker";
import persian_fa from "react-date-object/locales/persian_fa";
import persianModule from "react-date-object/calendars/persian";
const persian = persianModule.default;
const DatePicker = DatePickerModule.default;

export default function DateSection({ label, startDate, setStartDate }) {
  return (
    <div className="col-12">
      <label className="form-label text-dark fw-medium mb-1 text-sm">
        {label}
      </label>

      <DatePicker
        locale={persian_fa}
        calendar={persian}
        value={startDate}
        onChange={setStartDate}
        currentDate={new Date()}
        format="YYYY/MM/DD"
        inputClass="form-control"
        containerClassName="w-100"
        placeholder="انتخاب تاریخ شروع"
      />
    </div>
  );
}
