$(".scrollbar-sidebar").perfectScrollba$;
$(document).ready(function() {
    $(".btn-open-options").click(function() {
        $(".ui-theme-settings").toggleClass("settings-open")
    }), $(".close-sidebar-btn").click(function() {
        var t = $(this).attr("data-class");
        $(".app-container").toggleClass(t);
        var n = $(this);
        n.hasClass("is-active") ? n.removeClass("is-active") : n.addClass("is-active")
    }), $(".switch-container-class").on("click", function() {
        var t = $(this).attr("data-class");
        $(".app-container").toggleClass(t), $(this).parent().find(".switch-container-class").removeClass("active"), $(this).addClass("active")
    }), $(".switch-theme-class").on("click", function() {
        var t = $(this).attr("data-class");
        "body-tabs-line" == t && ($(".app-container").removeClass("body-tabs-shadow"), $(".app-container").addClass(t)), "body-tabs-shadow" == t && ($(".app-container").removeClass("body-tabs-line"), $(".app-container").addClass(t)), $(this).parent().find(".switch-theme-class").removeClass("active"), $(this).addClass("active")
    }), $(".switch-header-cs-class").on("click", function() {
        var t = $(this).attr("data-class");
        $(".switch-header-cs-class").removeClass("active"), $(this).addClass("active"), $(".app-header").attr("class", "app-header"), $(".app-header").addClass("header-shadow " + t)
    }), $(".switch-sidebar-cs-class").on("click", function() {
        var t = $(this).attr("data-class");
        $(".switch-sidebar-cs-class").removeClass("active"), $(this).addClass("active"), $(".app-sidebar").attr("class", "app-sidebar"), $(".app-sidebar").addClass("sidebar-shadow " + t)
    })
});

$(document).ready(function() {
    setTimeout(function() {
        if ($(".scrollbar-container")[0]) {
            $(".scrollbar-container").each(function() {
                new t.a($(this)[0], {
                    wheelSpeed: 2,
                    wheelPropagation: !1,
                    minScrollbarLength: 20
                })
            });
            new t.a(".scrollbar-sidebar", {
                wheelSpeed: 2,
                wheelPropagation: !1,
                minScrollbarLength: 20
            })
        }
    })
});




$(document).ready(function() {
    $(function() {
        var t, n = -1,
            r = 0;
        $("#closeButton").click(function() {
            $(this).is(":checked") ? $("#addBehaviorOnToastCloseClick").prop("disabled", !1) : ($("#addBehaviorOnToastCloseClick").prop("disabled", !0), $("#addBehaviorOnToastCloseClick").prop("checked", !1))
        }), $("#showtoast").click(function() {
            var a, o = $("#toastTypeGroup input:radio:checked").val(),
                l = $("#message").val(),
                s = $("#title").val() || "",
                d = $("#showDuration"),
                u = $("#hideDuration"),
                c = $("#timeOut"),
                h = $("#extendedTimeOut"),
                p = $("#showEasing"),
                f = $("#hideEasing"),
                m = $("#showMethod"),
                g = $("#hideMethod"),
                _ = r++,
                y = $("#addClear").prop("checked");
            i.a.options = {
                closeButton: $("#closeButton").prop("checked"),
                debug: $("#debugInfo").prop("checked"),
                newestOnTop: $("#newestOnTop").prop("checked"),
                progressBar: $("#progressBar").prop("checked"),
                rtl: $("#rtl").prop("checked"),
                positionClass: $("#positionGroup input:radio:checked").val() || "toast-top-right",
                preventDuplicates: $("#preventDuplicates").prop("checked"),
                onclick: null
            }, $("#addBehaviorOnToastClick").prop("checked") && (i.a.options.onclick = function() {
                alert("You can perform some custom action after a toast goes away")
            }), $("#addBehaviorOnToastCloseClick").prop("checked") && (i.a.options.onCloseClick = function() {
                alert("You can perform some custom action when the close button is clicked")
            }), d.val().length && (i.a.options.showDuration = parseInt(d.val())), u.val().length && (i.a.options.hideDuration = parseInt(u.val())), c.val().length && (i.a.options.timeOut = y ? 0 : parseInt(c.val())), h.val().length && (i.a.options.extendedTimeOut = y ? 0 : parseInt(h.val())), p.val().length && (i.a.options.showEasing = p.val()), f.val().length && (i.a.options.hideEasing = f.val()), m.val().length && (i.a.options.showMethod = m.val()), g.val().length && (i.a.options.hideMethod = g.val()), y && (l = function(e) {
                return e = e || "Clear itself?", e += '<br /><br /><button type="button" class="btn clear">Yes</button>'
            }(l), i.a.options.tapToDismiss = !1), l || (++n === (a = ["My name is Inigo Montoya. You killed my father. Prepare to die!", '<div><input class="input-small" value="textbox"/>&nbsp;<a href="http://johnpapa.net" target="_blank">This is a hyperlink</a></div><div><button type="button" id="okBtn" class="btn btn-primary">Close me</button><button type="button" id="surpriseBtn" class="btn" style="margin: 0 8px 0 8px">Surprise me</button></div>', "Are you the six fingered man?", "Inconceivable!", "I do not think that means what you think it means.", "Have fun storming the castle!"]).length && (n = 0), l = a[n]), $("#toastrOptions").text('Command: toastr["' + o + '"]("' + l + (s ? '", "' + s : "") + '")\n\ntoastr.options = ' + JSON.stringify(i.a.options, null, 2));
            var v = i.a[o](l, s);
            t = v, void 0 !== v && (v.find("#okBtn").length && v.delegat$("#okBtn", "click", function() {
                alert("you clicked me. i was toast #" + _ + ". goodbye!"), v.remov$()
            }), v.find("#surpriseBtn").length && v.delegat$("#surpriseBtn", "click", function() {
                alert("Surprise! you clicked me. i was toast #" + _ + ". You could perform an action here.")
            }), v.find(".clear").length && v.delegat$(".clear", "click", function() {
                i.a.clear(v, {
                    force: !0
                })
            }))
        }), $("#clearlasttoast").click(function() {
            i.a.clear(t)
        }), $("#cleartoasts").click(function() {
            i.a.clea$
        })
    }), $(".show-toastr-example").click(function() {
        i.a.options = {
            closeButton: !0,
            debug: !1,
            newestOnTop: !0,
            progressBar: !0,
            positionClass: "toast-bottom-center",
            preventDuplicates: !1,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        }, i.a.info("You don't have any new items in your calendar today!", "Example Toastr")
    })
})


     $(document).ready(function() {
    setTimeout(function() {
        $(".vertical-nav-menu").metisMenu()
    }, 100), $(".search-icon").click(function() {
        $(this).parent().parent().addClass("active")
    }), $(".search-wrapper .close").click(function() {
        $(this).parent().removeClass("active")
    }), $(".dropdown-menu").on("click", function(e) {
        var t = r.a._data(document, "events") || {};
        t = t.click || [];
        for (var n = 0; n < t.length; n++) t[n].selector && ($(e.target).is(t[n].selector) && t[n].handler.call(e.target, e), $(e.target).parents(t[n].selector).each(function() {
            t[n].handler.call(this, e)
        }));
        e.stopPropagation()
    }), $(function() {
        $('[data-toggle="popover"]').popove$
    }), $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    }), $(".mobile-toggle-nav").click(function() {
        $(this).toggleClass("is-active"), $(".app-container").toggleClass("sidebar-mobile-open")
    }), $(".mobile-toggle-header-nav").click(function() {
        $(this).toggleClass("active"), $(".app-header__content").toggleClass("header-mobile-open")
    }), $(window).on("resize", function() {
        $(this).width() < 1250 ? $(".app-container").addClass("closed-sidebar-mobile closed-sidebar") : $(".app-container").removeClass("closed-sidebar-mobile closed-sidebar")
    })
})