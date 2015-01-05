<div class="wrap erp-hr-employees">

    <h2><?php _e( 'Employee', 'wp-erp' ); ?> <a href="#" id="erp-employee-new" class="add-new-h2"><?php _e( 'Add New', 'wp-erp' ); ?></a></h2>

<?php
$vendors = array(
    array( 'Parvez Akhter', 'Software Engineer', 'Engineering', 'Full-Time Permanent', '1 Dec, 2013' ),
    array( 'Hasin Hayder', 'CTO', 'Engineering', 'Full-Time Permanent', '11 Jun, 2010' ),
    array( 'Nizam Uddin', 'Finance Manager', 'Sales', 'Full-Time Contract', '4 Mar, 2013' ),
    array( 'Kowsher Ahmed', 'QA Engineer', 'Engineering', 'internee', '5 Apr, 2013' ),
    array( 'M Asif Rahman', 'Sales Executive', 'Sales', 'Full-time Contract', '6 Nov, 2012' ),
);

?>

    <div class="tablenav top">
        <div class="alignleft actions bulkactions">
            <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
            <select name="action" id="bulk-action-selector-top">
                <option value="-1" selected="selected">Bulk Actions</option>
                <option value="email">Send Email</option>
                <option value="trash">Move to Trash</option>
            </select>
            <input type="submit" name="" id="doaction" class="button action" value="Apply">
        </div>
    </div>

    <table class="wp-list-table widefat fixed erp-employee-list-table">
        <thead>
            <tr>
                <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                    <input id="cb-select-all-1" type="checkbox">
                </th>
                <th class="col-"><?php _e( 'Name', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Job Title', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Department', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Employment Type', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Joined', 'accounting' ); ?></th>
            </tr>
        </thead>

        <tfoot>
            <tr>
                <th scope="col" id="cb" class="manage-column column-cb check-column" style="">
                    <input id="cb-select-all-1" type="checkbox">
                </th>
                <th class="col-"><?php _e( 'Name', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Job Title', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Department', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Employment Type', 'accounting' ); ?></th>
                <th class="col-"><?php _e( 'Joined', 'accounting' ); ?></th>
            </tr>
        </tfoot>

        <tbody id="the-list">
            <?php
            $employees = erp_hr_get_employees( erp_get_current_company_id() );

            if ( $employees ) {

                foreach( $employees as $num => $employee ) { ?>
                    <tr class="<?php echo $num % 2 == 0 ? 'alternate' : 'odd'; ?>">
                        <th scope="row" class="check-column">
                            <input id="cb-select-1" type="checkbox" name="post[]" value="1">
                        </th>
                        <td class="username col- column-username">
                            <?php echo get_avatar( '', 32 ); ?>

                            <strong><a href="<?php echo erp_hr_url_single_employee( $employee->id ); ?>"><?php echo $employee->get_full_name(); ?></a></strong>

                            <div class="row-actions">
                                <span class="edit"><a href="#" data-id="<?php echo $employee->id; ?>" title="<?php echo esc_attr( 'Edit this item', 'wp-erp' ); ?>"><?php _e( 'Edit', 'wp-erp' ); ?></a> | </span>
                                <span class="trash"><a class="submitdelete" data-id="<?php echo $employee->id; ?>" title="<?php echo esc_attr( 'Delete this item', 'wp-erp' ); ?>" href="#"><?php _e( 'Delete', 'wp-erp' ); ?></a></span>
                            </div>
                        </td>
                        <td class="col-"><?php echo $employee->get_job_title(); ?></td>
                        <td class="col-"><?php echo $employee->get_department_title(); ?></td>
                        <td class="col-"><?php echo $employee->get_type(); ?></td>
                        <td class="col-"><?php echo $employee->get_joined_date(); ?></td>
                    </tr>
                <?php } ?>
            <?php } else { ?>

                <tr>
                    <td colspan="6">
                        <?php _e( 'No employees found!', 'wp-erp' ); ?>
                    </td>
                </tr>

            <?php } ?>
        </tbody>
    </table>

    <div class="tablenav bottom">
        <div class="alignleft actions bulkactions">
            <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>
            <select name="action" id="bulk-action-selector-top">
                <option value="-1" selected="selected">Bulk Actions</option>
                <option value="trash">Move to Trash</option>
            </select>
            <input type="submit" name="" id="doaction" class="button action" value="Apply">
        </div>
    </div>

</div>