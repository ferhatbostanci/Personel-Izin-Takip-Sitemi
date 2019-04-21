/*
 * View 'leave_history_view'
 */

SELECT leave_history.id, staff.id AS staff_id, leave_history.start_date, leave_history.end_date, leave_history.registration_date,
       leave_types.name AS typename,
       CONCAT(staff.name, ' ', staff.surname) AS staffname,
       IF(staff.title IS NULL, 1, 0) AS worker,
       CONCAT(users.name, ' ', users.surname) AS recordby
FROM leave_history
            INNER JOIN staff ON staff.id = leave_history.staff_id
            INNER JOIN users ON users.id = leave_history.user_id
            INNER JOIN leave_types ON leave_types.id = leave_history.leave_type

/*
 * View 'yearly_leave_data_view'
 */

SELECT yearly_leave_data.*,
       CONCAT(staff.name, ' ', staff.surname) AS staffname,
       IF(staff.title IS NULL, 1, 0) AS worker
FROM yearly_leave_data
            INNER JOIN staff ON staff.id = yearly_leave_data.staff_id