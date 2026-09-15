export default function   BookingError({error}) {
  return (
    <div className="alert alert-danger d-flex align-items-center py-2 mb-0">

<i className="fa-solid fa-circle-exclamation ms-2"></i>

<span className="small">
{error}
</span>

</div>
  );
}
