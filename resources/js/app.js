import Alpine from "alpinejs";
import tinymce from "tinymce";
import "tinymce/icons/default";
import "tinymce/themes/silver";
import "tinymce/models/dom";

import "tinymce/plugins/advlist";
import "tinymce/plugins/autolink";
import "tinymce/plugins/lists";
import "tinymce/plugins/link";
import "tinymce/plugins/image";
import "tinymce/plugins/charmap";
import "tinymce/plugins/preview";
import "tinymce/plugins/pagebreak";
import "tinymce/plugins/searchreplace";
import "tinymce/plugins/wordcount";
import "tinymce/plugins/visualblocks";
import "tinymce/plugins/visualchars";
import "tinymce/plugins/code";
import "tinymce/plugins/fullscreen";
import "tinymce/plugins/insertdatetime";
import "tinymce/plugins/media";
import "tinymce/plugins/nonbreaking";
import "tinymce/plugins/save";
import "tinymce/plugins/table";
import "tinymce/plugins/directionality";
import "tinymce/plugins/emoticons";
import "tinymce/plugins/anchor";

window.Alpine = Alpine;
window.tinymce = tinymce;

Alpine.start();

document.addEventListener("DOMContentLoaded", () => {
    const editor = document.querySelector("textarea.my-editor");

    if (!editor) {
        return;
    }

    tinymce.init({
        selector: "textarea.my-editor",

        license_key: "gpl",

        base_url: "/tinymce",
        suffix: ".min",

        skin_url: "/tinymce/skins/ui/oxide",
        content_css: "/tinymce/skins/ui/oxide/content.min.css",

        relative_urls: false,

        plugins: [
            "advlist",
            "autolink",
            "lists",
            "link",
            "image",
            "charmap",
            "preview",
            "pagebreak",
            "searchreplace",
            "wordcount",
            "visualblocks",
            "visualchars",
            "code",
            "fullscreen",
            "insertdatetime",
            "media",
            "nonbreaking",
            "save",
            "table",
            "directionality",
            "emoticons",
            "anchor",
        ],

        toolbar:
            "undo redo | styleselect | bold italic | " +
            "alignleft aligncenter alignright alignjustify | " +
            "bullist numlist outdent indent | link image media",

        file_picker_callback: function (callback, value, meta) {
            const x =
                window.innerWidth ||
                document.documentElement.clientWidth ||
                document.body.clientWidth;

            const y =
                window.innerHeight ||
                document.documentElement.clientHeight ||
                document.body.clientHeight;

            let cmsURL =
                "/laravel-filemanager?editor=" +
                encodeURIComponent(meta.fieldname);

            if (meta.filetype === "image") {
                cmsURL += "&type=Images";
            } else {
                cmsURL += "&type=Files";
            }

            tinymce.activeEditor.windowManager.openUrl({
                url: cmsURL,
                title: "File Manager",
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no",

                onMessage: (api, message) => {
                    callback(message.content);
                },
            });
        },
    });
});
