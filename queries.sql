/*
 * View 'detail_leave_history'
 */

SELECT leave_history.id, leave_history.start_date, leave_history.end_date, leave_history.registration_date,
       leave_types.name AS typename,
       CONCAT(staff.name, ' ', staff.surname) AS staffname,
       CONCAT(users.name, ' ', users.surname) AS recordby
FROM leave_history
            INNER JOIN staff ON staff.id = leave_history.staff_id
            INNER JOIN users ON users.id = leave_history.user_id
            INNER JOIN leave_types ON leave_types.id = leave_history.leave_type