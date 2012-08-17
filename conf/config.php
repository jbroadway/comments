; <?php

[Comments]

; Whether to require moderation by an admin. Will
; put all new messages into pending instead of
; approved state and trigger an email notification
; when enabled.

moderation = Off

; The email address to send moderation notifications.

moderator_email = ""

; The list of statuses for comments. Stored in the
; database as integers where:
;
; 0  = Pending
; 1  = Approved
; 2+ = Not approved

status_list = "Pending, Approved, Rejected, Spam"

[Admin]

handler = comments/admin
name = Comments
install = comments/install
upgrade = comments/upgrade
version = 0.9-beta

; */ ?>