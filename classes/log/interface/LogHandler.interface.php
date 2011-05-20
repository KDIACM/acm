<?php
/**
 * ILogHandler interface
 *
 * @access public
 * @author Deshapriya De Silva
 */
interface ILogHandler
{
    // --- OPERATIONS ---

    /**
     * Short description of method Log
     *
     * @access public
     * @author Kasun Thilina
     * @return void
     */
    public function Log($p_log_msg,$p_log_sql_msg,$p_log_subject='',$p_log_priority=CLogger::LOG_PRIORITY_TYPE_INFO);

}
?>