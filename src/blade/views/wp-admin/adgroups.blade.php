<!-- Include Tailwind CSS -->

<div id="adgroupMapper">
  <adgroup-mapper
    adgroups='@php echo json_encode($adgroups); @endphp'
    posts='@php echo json_encode($posts); @endphp'
    offers='@php echo json_encode($offers); @endphp'
  />
</div>
