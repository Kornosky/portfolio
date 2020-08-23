
'use strict';


$(document).ready(function () {
  "use strict"; // Start of use strict

  var folder = "../images/2dworks/";

  $.ajax({
    url: folder,
    success: function (data) {
      $(data)
        .find("a")
        .attr("href", function (i, val) {
          if (val.match(/\.(jpe?g|png|gif)$/)) {
            console.log("SHIT");
            $("#photos").append("<img src='" + folder + val + "'>");
          }
        });
    },
  });
});


// $(window).ready(function () {
//   var dropIndex;
//   $("#photos").sortable({
//     group: "simple_with_animation",
//     pullPlaceholder: false,
//     // animation on drop NOT WORKING
//     onDrop: function ($item, container, _super) {
//       var $clonedItem = $("<ul/>").css({ height: 0 });
//       $item.before($clonedItem);
//       $clonedItem.animate({ height: $item.height() });

//       $item.animate($clonedItem.position(), function () {
//         $clonedItem.detach();
//         _super($item, container);
//       });
//     },

//     // set $item relative to cursor position
//     onDragStart: function ($item, container, _super) {
//       var offset = $item.offset(),
//         pointer = container.rootGroup.pointer;

//       adjustment = {
//         left: pointer.left - offset.left,
//         top: pointer.top - offset.top,
//       };

//       _super($item, container);
//     },
//     onDrag: function ($item, position) {
//       $item.css({
//         left: position.left - adjustment.left,
//         top: position.top - adjustment.top,
//       });
//     },

//     // def working
//     update: function (event, ui) {
//       dropIndex = ui.item.index();
//     },
//   });

//   $("#submit").click(function (e) {
//     var imageIdsArray = [];
//     $("#image-list li").each(function (index) {
//       if (index <= dropIndex) {
//         var id = $(this).attr("id");
//         var split_id = id.split("_");
//         imageIdsArray.push(split_id[1]);
//       }
//     });

//     $.ajax({
//       url: "reorderUpdate.php",
//       type: "post",
//       data: { imageIds: imageIdsArray },
//       success: function (response) {
//         $("#txtresponse").css("display", "inline-block");
//         $("#txtresponse").text(response);
//       },
//     });
//     e.preventDefault();
//   });
// });
console.log("SLDKJFSLKDFJLS");
