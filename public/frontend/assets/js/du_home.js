$(function () {
  $(".datepicker").datepicker({
    changeMonth: true,
    dateFormat: "dd-mm-yy",
  });

  $(".findYourProgram").hide();
  $(".showingProgramName").hide();
  $("#looking_for").change(function () {
    let lookingType = $(this).val();
    if (lookingType != null) {
      $(".findYourProgram").show();
    } else {
      $(".findYourProgram").hide();
    }
  });
  $("#deptName").change(function () {
    let deptID = $(this).val();
    if (deptID != null) {
      $(".showingProgramName").show();
    } else {
      $(".showingProgramName").hide();
    }
  });
  $("#institute_portion").hide();
});
function clickFindProgram() {
  $(".findYourProgram").hide();
  $(".showingProgramName").hide();
}

function serchingFindProgram() {
  $.ajax({
    type: "GET",
    url: base_url + "/search_find_program",
    data: $("#search_find_program_form").serialize(),
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        $(".showProgramName").html("");
        if (response.data.length === 0) {
          $(".showProgramName").html("No Program Exist.");
        } else {
          $.each(response.data, function (index, Obj) {
            $(".showProgramName").append(
              '<a  href="show_program_details/' +
                Obj.id +
                '"><i class="fas fa-share prefix grey-text"></i> ' +
                Obj.program_name +
                '</a> <div class="clearfix"></div>'
            );
          });
        }
      } else {
        $(".showProgramName").html(
          '<div style="color:red"> <i class="fas fa-share prefix grey-text"></i> No Program Exist.</div>'
        );
      }
    },
  });
}

function saveNewsLetter(email) {
  $.ajax({
    type: "GET",
    url: base_url + "/save_news_letter",
    data: { email: email },
    dataType: "json",
    success: function (response) {
      if (response.status == "success") {
        $("#newsLetterEmail").val("");
        alert(response.message);
      } else {
        alert(response.message);
      }
    },
  });
}
$("input[name$='searching_type_aca_program']").click(function () {
  var search_type = $(this).val();
  $("#show_result").html("");
  if (search_type == "faculty") {
    $("#faculty_portion_academic").show();
    $("#institute_portion_academic").hide();
    $("#department_aca").html('<option value="">Select Department</option>');
  } else if (search_type == "institute") {
    $("#faculty_portion_academic").hide();
    $("#institute_portion_academic").show();
    $.ajax({
      type: "GET",
      url: base_url + "/showBodyInfoType",
      data: { parent_id: "INST" },
      dataType: "json",
      success: function (response) {
        console.log(response);
        var toAppend = "";
        $("#institute_name_aca").html(
          '<option value="">Select Institute</option>'
        );
        if (response.status == "success") {
          var data = response.data;
          $.each(data, function (index, val) {
            toAppend +=
              "<option value='" + val.id + "'>" + val.name + "</option>";
          });
          $("#institute_name_aca").append(toAppend);
        } else {
          $("#institute_name_aca").html(
            '<option value="">Select Institute</option>'
          );
        }
      },
    });
  }
});

function showDeptByFacultyID(val) {
  $("#show_result").html("");
  $.ajax({
    type: "GET",
    url: base_url + "/showBodyInfoType",
    data: { parent_id: val },
    dataType: "json",
    success: function (response) {
      var toAppend = "";
      $(".department").html('<option value="">Select Department</option>');
      if (response.status == "success") {
        var data = response.data;
        $.each(data, function (index, val) {
          toAppend +=
            "<option value='" + val.id + "'>" + val.name + "</option>";
        });
        $(".department").append(toAppend);
      } else {
        $(".department").html('<option value="">Select Department</option>');
      }
    },
  });
}
function showAcademicCalenderInfo() {
  $("#show_result").html("");
  $(".loader").show();
  var data = $("#search_academic_calender_info_form").serialize();
  $.ajax(base_url + "/showAacademicCalenderInfo?" + data, {
    success: function (data, status, xhr) {
      // success callback function
      $(".loader").hide();
      $("#show_result").html(data);
    },
  });
}

$("#facultyName").change(function () {
  var facultyID = $(this).val();
  $.ajax({
    type: "POST",
    url: base_url + "/showAllDeptByFaculty",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: { parent_id: facultyID },
    success: function (data) {
      $("#show_result").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#depatmentName").keyup(function () {
  var deptSearching = $(this).val();
  $.ajax({
    type: "POST",
    url: base_url + "/showAllDeptByFaculty",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: { deptSearching: deptSearching },
    success: function (data) {
      $("#show_result").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#searchBody").change(function () {
  var facultyID = $(this).val();
  $.ajax({
    type: "POST",
    url: base_url + "/showAllDeptByFaculty",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: { bodyid: facultyID },
    success: function (data) {
      $("#show_result").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

function searchCollegesInfo(val, type) {
  $.ajax({
    type: "POST",
    url: base_url + "/showCollegesInfo",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: { searching_item: val, type: type },
    success: function (data) {
      $("#show_result_colleges").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
}
$("#accordion").on("show.bs.collapse", function () {
  $("#accordion .in").collapse("hide");
});

function saveQuickContact() {
  $.ajax({
    type: "POST",
    url: base_url + "/saveQickContactLetter",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#quickContactForm").serialize(),

    dataType: "json",
    success: function (data) {
      if (data.error.length > 0) {
        var error_html = "";
        for (var count = 0; count < data.error.length; count++) {
          error_html +=
            '<div class="alert alert-danger">' + data.error[count] + "</div>";
        }
        $("#message").html(error_html);
      } else {
        $("#quickContactForm")[0].reset();
        var successMsg =
          '<div class="alert alert-success">' + data.success + "</div>";
        $("#message").html(successMsg);
        setTimeout(function () {
          $("#message").html("");
        }, 1000);
      }
    },
  });
}
function showAcademicProgramInfo() {
  $("#show_result").html("");
  $(".loader").show();
  var data = $("#search_academic_program_info_form").serialize();
  $.ajax(base_url + "/showAacademicProgramInfo?" + data, {
    success: function (data, status, xhr) {
      // success callback function
      $(".loader").hide();
      $("#show_result").html(data);
    },
  });
}

// Employee Directory
function directorySearchAgain() {
  $("#search_employee_directory_form")[0].reset();
  $("#show_result").html("");
  $("#office_portion").hide();
  $("#faculty_portion").hide();
  $("#institute_portion").hide();
  $("#hall_portion").hide();
  $("#employee_type_portion").hide();
  $("#research_center_portion").hide();
  $("#searching_portion").hide();
}

$(document).ready(function () {
  $("#office_portion").hide();
  $("#faculty_portion").hide();
  $("#institute_portion").hide();
  $("#hall_portion").hide();
  $("#employee_type_portion").hide();
  $("#research_center_portion").hide();
  $("#searching_portion").hide();

  $("#faculty_portion_academic").show();
  $("#institute_portion_academic").hide();

  $("input[name$='searching_type']").click(function () {
    //$('#search_employee_directory_form')[0].reset();
    var search_type = $(this).val();
    $("#show_result").html("");
    if (search_type == "office") {
      $("#office_portion").show();
      $("#employee_type_portion").show();
      $("#faculty_portion").hide();
      $("#institute_portion").hide();
      $("#research_center_portion").hide();
      $("#hall_portion").hide();

      $("#searching_portion").show();

      $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: base_url + "/search_employee_search_type",
        data: { searchType: search_type },
        dataType: "json",
        success: function (response) {
          var toAppend = "";
          $("#office_name").html('<option value="">Select Office</option>');
          if (response.status == "success") {
            var data = response.data;
            $.each(data, function (index, val) {
              toAppend +=
                "<option value='" + val.id + "'>" + val.title + "</option>";
            });
            $("#office_name").append(toAppend);
          } else {
            $("#office_name").html('<option value="">Select Office</option>');
          }
        },
      });
    } else if (search_type == "faculty") {
      $("#office_portion").hide();
      $("#employee_type_portion").show();
      $("#faculty_portion").show();
      $("#institute_portion").hide();
      $("#research_center_portion").hide();
      $("#hall_portion").hide();
      $("#searching_portion").show();
      $("#department").html('<option value="">Select Department</option>');

      $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: base_url + "/search_employee_search_type",
        data: { searchType: search_type },
        dataType: "json",
        success: function (response) {
          var toAppend = "";
          $("#faculty_name").html('<option value="">Select Faculty</option>');
          if (response.status == "success") {
            var data = response.data;
            $.each(data, function (index, val) {
              toAppend +=
                "<option value='" + val.id + "'>" + val.title + "</option>";
            });
            $("#faculty_name").append(toAppend);
          } else {
            $("#faculty_name").html('<option value="">Select Faculty</option>');
          }
        },
      });
    } else if (search_type == "instituteInfo") {
      $("#office_portion").hide();
      $("#employee_type_portion").show();
      $("#faculty_portion").hide();
      $("#institute_portion").show();
      $("#research_center_portion").hide();
      $("#hall_portion").hide();
      $("#searching_portion").show();
      $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: base_url + "/search_employee_search_type",
        data: { searchType: search_type },
        dataType: "json",
        success: function (response) {
          var toAppend = "";
          $("#institute_name").html(
            '<option value="">Select Institute</option>'
          );
          if (response.status == "success") {
            var data = response.data;
            $.each(data, function (index, val) {
              toAppend +=
                "<option value='" + val.id + "'>" + val.title + "</option>";
            });
            $("#institute_name").append(toAppend);
          } else {
            $("#institute_name").html(
              '<option value="">Select Institute</option>'
            );
          }
        },
      });
    } else if (search_type == "research_center") {
      $("#office_portion").hide();
      $("#employee_type_portion").show();
      $("#faculty_portion").hide();
      $("#institute_portion").hide();
      $("#research_center_portion").show();
      $("#hall_portion").hide();

      $("#searching_portion").show();

      $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: base_url + "/search_employee_search_type",
        data: { searchType: search_type },
        dataType: "json",
        success: function (response) {
          var toAppend = "";
          $("#research_center_name").html(
            '<option value="">Select Research Centre</option>'
          );
          if (response.status == "success") {
            var data = response.data;
            $.each(data, function (index, val) {
              toAppend +=
                "<option value='" + val.id + "'>" + val.title + "</option>";
            });
            $("#research_center_name").append(toAppend);
          } else {
            $("#research_center_name").html(
              '<option value="">Select Research Centre</option>'
            );
          }
        },
      });
    } else if (search_type == "halls") {
      $("#office_portion").hide();
      $("#employee_type_portion").show();
      $("#faculty_portion").hide();
      $("#institute_portion").hide();
      $("#research_center_portion").hide();
      $("#hall_portion").show();

      $("#searching_portion").show();

      $.ajax({
        type: "GET",
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        url: base_url + "/search_employee_search_type",
        data: { searchType: search_type },
        dataType: "json",
        success: function (response) {
          var toAppend = "";
          $("#hall_name").html('<option value="">Select Hall</option>');
          if (response.status == "success") {
            var data = response.data;
            $.each(data, function (index, val) {
              toAppend +=
                "<option value='" + val.id + "'>" + val.title + "</option>";
            });
            $("#hall_name").append(toAppend);
          } else {
            $("#hall_name").html('<option value="">Select Hall</option>');
          }
        },
      });
    }
  });
});
$("#faculty_name").change(function () {
  var facultyName = $(this).val();
  $.ajax({
    type: "GET",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: base_url + "/search_employee_search_type",
    data: { searchType: "deptInfo", faculty_id: facultyName },
    dataType: "json",
    success: function (response) {
      var deptAppend = "";
      $("#department").html(
        '<option value="">Select Department <option value="ডিন অফিস">Dean Office </option></option>'
      );
      if (response.status == "success") {
        var data = response.data;
        $.each(data, function (index, val) {
          deptAppend +=
            "<option value='" + val.id + "'>" + val.title + "</option>";
        });
        $("#department").append(deptAppend);
      } else {
        $("#department").html('<option value="">Select Department</option>');
      }
    },
  });
});

function searching_employee_info() {
  $(".loader").show();
  $.ajax({
    type: "GET",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: base_url + "/search_employee_directory_info",
    data: $("#search_employee_directory_form").serialize(),
    success: function (response) {
      $(".loader").hide();
      $("#show_result").html(response);
    },
  });
}
// Show all Publiction
function showEmployeePublication(employee_id, deptID) {
  $(".publication-ul-li").css("background", "white");
  $("#activeEmployeeSelected_" + employee_id).css({
    "background-color": "lightgray",
    "border-radius": "5px",
  });
  var publicationCtgArr = [];
  $("input.publicationCtg:checkbox:checked").each(function () {
    publicationCtgArr.push($(this).val());
  });
  $(".loader").show();
  $("#EmployeeInfoID").val(employee_id);
  $.ajax({
    type: "POST",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: base_url + "/showEmployeePublication",
    data: {
      employee_id: employee_id,
      deptID: deptID,
      publicationCtg: publicationCtgArr,
    },
    success: function (response) {
      $(".loader").hide();
      $("#show_result").html(response);
    },
  });
}

$("#searchingEmployeeInfo").keyup(function () {
  var searchName = $(this).val();
  var url = $(location).attr("href");
  var segments = url.split("/");
  var deptID = segments[segments.length - 1];
  $.ajax({
    type: "POST",
    url: base_url + "/showEmployeeInfo",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: { searchInfo: searchName, deptID: deptID },
    success: function (data) {
      $("#showEmployeeInfo").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});
$("#searchingDeptInfo").keyup(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/showDepartmentInfo",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#research_publication_form").serialize(),
    success: function (data) {
      $("#showDeptInfo").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#searchingFacultyName").change(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/showDepartmentInfoByFaculty",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#research_publication_form").serialize(),
    success: function (data) {
      $("#showDeptInfo").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$(".publicationCtg").click(function () {
  // var element_id = elementId($(this).attr('id'));
  var empID = $("#EmployeeInfoID").val();
  var publicationCtgArr = [];
  $("input.publicationCtg:checkbox:checked").each(function () {
    publicationCtgArr.push($(this).val());
  });
  var url = $(location).attr("href");
  var segments = url.split("/");
  var deptID = segments[segments.length - 1];
  $(".loader").show();
  $.ajax({
    type: "POST",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    url: base_url + "/showEmployeePublication",
    data: {
      publicationCtg: publicationCtgArr,
      deptID: deptID,
      employee_id: empID,
    },
    success: function (response) {
      $(".loader").hide();
      $("#show_result").html(response);
    },
  });
});

function elementId(id_arr) {
  var id = id_arr.split("_");
  return id[id.length - 1];
}
$(document).ready(function () {
  $("#example").DataTable();
});

//funded project
$("#searchingFacultyNameFundedProject").change(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_funded_project",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#funded_project_form").serialize(),
    success: function (data) {
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});
$("#searchingDeptInfoFundedProject").keyup(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_funded_project",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#funded_project_form").serialize(),
    success: function (data) {
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

function goBack() {
  window.history.back();
}

// NOC

$(document).ready(function () {
  var nocRecordTable = $("#nocList").DataTable({
    serverSide: true,
    ajax: {
      url: base_url + "/du_nocDataSource",
      method: "get",
      data: function (d) {
        d.applyType = $("input[name='applyType']:checked").val();
      },
    },
    language: {
      processing: "<img src='fontView/assets/img/ajax-loader.gif' />",
    },
    columnDefs: [
      {
        targets: [4],
        orderable: false,
      },
    ],
  });
  $(".applyType").change(function () {
    nocRecordTable.draw();
  });

  $("#trustFunds").DataTable({
    serverSide: true,
    ajax: {
      url: base_url + "/trustFundsAction",
      method: "get",
    },
    columnDefs: [
      {
        targets: [4],
        orderable: false,
      },
    ],
  });

  $("#duBartaInfoData").DataTable({
    serverSide: true,
    ajax: {
      url: base_url + "/duBartaInfoAction",
      method: "get",
    },
    columnDefs: [
      {
        targets: [4],
        orderable: false,
      },
    ],
  });

  $("#myTable").DataTable({});

  $("#scholarshipFinancialInfo").DataTable({
    serverSide: true,
    ajax: {
      url: base_url + "/scholarshipFinancialInfoAction",
      method: "get",
    },
    columnDefs: [
      {
        targets: [4],
        orderable: false,
      },
    ],
  });

  var regGraduateListTable = $("#regGraduateList").DataTable({
    serverSide: true,
    ajax: {
      url: base_url + "/registeredGraduateAction",
      method: "get",
      data: function (d) {
        d.district = $(".districtChange").val();
        d.upazila = $(".upazilaInfo").val();
      },
    },
    language: {
      processing: "<img src='fontView/assets/img/ajax-loader.gif' />",
    },
    columnDefs: [
      {
        targets: [4],
        orderable: false,
      },
    ],
  });
  $(".districtChange,.upazilaInfo").change(function () {
    regGraduateListTable.draw();
  });
});

// update faculty member views

$("#facultyMemberName").keyup(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_faculty_member_info",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#facultyMemberSearchingInfo").serialize(),
    success: function (data) {
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#facultyIdSearchingfacultyMember").change(function () {
  var facultyId = $(this).val();
  $.ajax({
    type: "GET",
    url: base_url + "/showBodyInfoType",
    data: { parent_id: facultyId },
    dataType: "json",
    success: function (response) {
      var toAppend = "";
      $("#deptIdSearchingfacultyMember").html(
        '<option value="">Select One</option>'
      );
      if (response.status == "success") {
        var data = response.data;
        $.each(data, function (index, val) {
          toAppend +=
            "<option value='" + val.id + "'>" + val.name + "</option>";
        });
        $("#deptIdSearchingfacultyMember").append(toAppend);
      } else {
        $("#deptIdSearchingfacultyMember").html(
          '<option value="">Select One</option>'
        );
      }
    },
  });
});
$("#deptIdSearchingfacultyMember").change(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_faculty_member_info",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#facultyMemberSearchingInfo").serialize(),
    success: function (data) {
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#deptIdSearchingOfficer").change(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_officer_info",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#facultyMemberSearchingInfo").serialize(),
    success: function (data) {
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#officerMemberName").keyup(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_officer_info",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#facultyMemberSearchingInfo").serialize(),
    success: function (data) {
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$(".panel-collapse").on("show.bs.collapse", function () {
  $(this).siblings(".panel-heading").addClass("active");
});

$(".panel-collapse").on("hide.bs.collapse", function () {
  $(this).siblings(".panel-heading").removeClass("active");
});

$("#countryNameCollaboration").change(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_research_collaboration_info",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#research_collaboration_form").serialize(),
    success: function (data) {
      // console.log(count_data);
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#searchingCollaboration").keyup(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searching_research_collaboration_info",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#research_collaboration_form").serialize(),
    success: function (data) {
      // console.log(count_data);
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#facultyNameChairman").change(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searchDeptChairmanInfo",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#chairman_list_form").serialize(),
    success: function (data) {
      // console.log(count_data);
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

$("#depatmentNameChairman").keyup(function () {
  $.ajax({
    type: "POST",
    url: base_url + "/searchDeptChairmanInfo",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#chairman_list_form").serialize(),
    success: function (data) {
      // console.log(count_data);
      $("#showData").html(data);
    },
    error: function (data) {
      console.log(data);
    },
  });
  return false;
});

function toggleIcon(e) {
  $(e.target)
    .prev(".panel-heading")
    .find(".more-less")
    .toggleClass("glyphicon-plus glyphicon-minus");
}
$(".panel-group").on("hidden.bs.collapse", toggleIcon);
$(".panel-group").on("shown.bs.collapse", toggleIcon);

// $( function() {
//     console.log('hello the world');
//     var availableTags = [
//         "ActionScript",
//         "AppleScript",
//         "Asp",
//         "BASIC",
//         "C",
//         "C++",
//         "Clojure",
//         "COBOL",
//         "ColdFusion",
//         "Erlang",
//         "Fortran",
//         "Groovy",
//         "Haskell",
//         "Java",
//         "JavaScript",
//         "Lisp",
//         "Perl",
//         "PHP",
//         "Python",
//         "Ruby",
//         "Scala",
//         "Scheme"
//     ];
//     $( "#eventSearching" ).autocomplete({
//         source: availableTags
//     });
// });

function autoCompleteSearchingPosting(data) {
  var type = $("#type").val();
  if (data.value.trim() == "") {
    $("#eventSearching").val("");
    return false;
  }
  var options = {
    minLength: 1,
    source: function (request, response) {
      $.ajax({
        url: base_url + "/searching_posting_info",
        method: "post",
        dataType: "json",
        autoFocus: true,
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
          term: request.term,
          type: type,
        },
        success: function (data) {
          response(data);
        },
      });
    },
    select: function (event, ui) {
      //$( "#showInfo" ).hide();
      if (ui.item.value != "") {
        $("#eventSearchingId").val(ui.item.id);
        $("#eventSearching").val(ui.item.value);
        var eventSearching = $("#eventSearching").val();
        $(".loadlater").show();
        $.ajax({
          type: "POST",
          url: base_url + "/searchingPost",
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: {
            post_id: ui.item.id,
            type: type,
            searchingInfoPostTitle: eventSearching,
          },
          success: function (response) {
            $(".loadlater").hide();
            if (response != "") {
              $("#showInfo").html(response);
            } else {
              $("#showInfo").html("");
            }
          },
        });
      } else {
        $("#employee_name_search").val("");
        $("#employee_id_search").val("");
        $("#employee_info_search").hide();
      }
      return false;
    },
  };
  $("body").on("keydown.autocomplete", "#eventSearching", function () {
    $(this).autocomplete(options);
  });
}

function searchingEventInfo() {
  $(".loadlater").show();
  $.ajax({
    type: "POST",
    url: base_url + "/searchingPost",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: $("#searchingForm").serialize(),
    success: function (response) {
      $(".loadlater").hide();
      if (response != "") {
        $("#showInfo").html(response);
      } else {
        $("#showInfo").html("");
      }
    },
  });
}

$(document).ready(function () {
  jQuery(".programLevel").click(function () {
    var selectedProgramLevel = new Array();
    var n = jQuery(".programLevel:checked").length;
    if (n > 0) {
      jQuery(".programLevel:checked").each(function () {
        selectedProgramLevel.push($(this).val());
      });
    }
    var selectedFaculty = new Array();
    var n = jQuery(".programFaculty:checked").length;
    if (n > 0) {
      jQuery(".programFaculty:checked").each(function () {
        selectedFaculty.push($(this).val());
      });
    }
    $("#showCourseFinder").html("");
    $(".loadlater").show();
    $.ajax({
      type: "POST",
      url: base_url + "/searchingProgramInfo",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: {
        programLevel: selectedProgramLevel,
        programFaculty: selectedFaculty,
      },
      success: function (response) {
        $(".loadlater").hide();
        if (response != "") {
          $("#showCourseFinder").html(response);
        } else {
          $("#showCourseFinder").html("");
        }
      },
    });
  });

  jQuery(".programFaculty").click(function () {
    var selectedFaculty = new Array();
    var n = jQuery(".programFaculty:checked").length;
    if (n > 0) {
      jQuery(".programFaculty:checked").each(function () {
        selectedFaculty.push($(this).val());
      });
    }
    var selectedProgramLevel = new Array();
    var n = jQuery(".programLevel:checked").length;
    if (n > 0) {
      jQuery(".programLevel:checked").each(function () {
        selectedProgramLevel.push($(this).val());
      });
    }

    $(".loadlater").show();
    $("#showInfo").html("");
    $.ajax({
      type: "POST",
      url: base_url + "/searchingProgramInfo",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: {
        programFaculty: selectedFaculty,
        programLevel: selectedProgramLevel,
      },
      success: function (response) {
        $(".loadlater").hide();
        if (response != "") {
          $("#showCourseFinder").html(response);
        } else {
          $("#showCourseFinder").html("");
        }
      },
    });
  });
});

function searchingProgram(data) {
  if (data.value.trim() == "") {
    $("#programNameID").val("");
    $("#programName").val("");
    return false;
  }
  var options = {
    minLength: 1,
    source: function (request, response) {
      $.ajax({
        url: base_url + "/searching_program_info",
        method: "post",
        dataType: "json",
        autoFocus: true,
        headers: {
          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
          term: request.term,
        },
        success: function (data) {
          response(data);
        },
      });
    },
    select: function (event, ui) {
      //$( "#showInfo" ).hide();
      if (ui.item.value != "") {
        $("#programNameID").val(ui.item.id);
        $("#programName").val(ui.item.value);
        $(".loadlater").show();
        $.ajax({
          type: "POST",
          url: base_url + "/searchingProgramInfo",
          headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
          },
          data: { program_id: ui.item.id },
          success: function (response) {
            $(".loadlater").hide();
            if (response != "") {
              $("#showCourseFinder").html(response);
            } else {
              $("#showCourseFinder").html("");
            }
          },
        });
      } else {
        $("#programNameID").val("");
        $("#programName").val("");
      }
      return false;
    },
  };
  $("body").on("keydown.autocomplete", "#programName", function () {
    $(this).autocomplete(options);
  });
}

$("#programName").keyup(function (e) {
  var searchProgram = $(this).val();
  $.ajax({
    type: "POST",
    url: base_url + "/searchingProgramInfo",
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
    data: { searchProgram: searchProgram },
    success: function (response) {
      $(".loadlater").hide();
      if (response != "") {
        $("#showCourseFinder").html(response);
      } else {
        $("#showCourseFinder").html("");
      }
    },
  });
});

$(document).ready(function () {
  var searchProgram = $("#programName").val();
  if (searchProgram != "") {
    $.ajax({
      type: "POST",
      url: base_url + "/searchingProgramInfo",
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
      },
      data: { searchProgram: searchProgram },
      success: function (response) {
        $(".loadlater").hide();
        if (response != "") {
          $("#showCourseFinder").html(response);
        } else {
          $("#showCourseFinder").html("");
        }
      },
    });
  }
});

$(".districtChange").change(function () {
  var districtID = $(this).val();
  $.ajax({
    type: "GET",
    url: base_url + "/showUpazilaFromDistrictID",
    data: { districtID: districtID },
    dataType: "json",
    success: function (response) {
      var toAppend = "";
      $(".upazilaInfo").html('<option value="">Select Upazila</option>');
      if (response.status == "success") {
        var data = response.data;
        $.each(data, function (index, val) {
          toAppend += "<option value='" + val + "'>" + index + "</option>";
        });
        $(".upazilaInfo").append(toAppend);
      } else {
        $(".upazilaInfo").html('<option value="">Select Upazila</option>');
      }
    },
  });
});

$(document).ready(function () {
  $("#service_received_date").datepicker({ dateFormat: "dd-mm-yy" });
});

function starSet(rating) {
  for (var i = 1; i <= 5; i++) {
    var element = document.getElementById("star" + i);
    element.classList.remove("checked");
  }
  for (var i = 1; i <= rating; i++) {
    var element = document.getElementById("star" + i);
    element.classList.add("checked");
  }
  document.getElementById("rating").value = rating;
  console.log(document.getElementById("rating").value);
}

function getFeedbackUserType(userType) {
  if (userType == "Student") {
    $("#registration_no").css("display", "block");
    $("#employee_id").css("display", "none");
  } else if (userType == "T_O_S") {
    $("#registration_no").css("display", "none");
    $("#employee_id").css("display", "block");
  } else {
    $("#registration_no").css("display", "none");
    $("#employee_id").css("display", "none");
  }
}

$("#myTable_service_list").DataTable({
  bPaginate: false,
});

$("#reload").click(function () {
  $.ajax({
    type: "GET",
    url: base_url + "/refresh_captcha",

    success: function (data) {
      $(".captcha span").html(data.captcha);
    },
  });
});
