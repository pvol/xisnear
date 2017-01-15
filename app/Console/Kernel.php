<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\Inspire::class,
        \App\Console\Commands\Collection\GetData::class,
        \App\Console\Commands\Collection\GetM0Data::class,
        \App\Console\Commands\Collection\DispatchCase::class,
        \App\Console\Commands\Collection\DispatchM0Case::class,
        \App\Console\Commands\Collection\AutoSendSms::class,
        \App\Console\Commands\Collection\M1DispatchEmail::class,
        \App\Console\Commands\Collection\PtpNoticeEmail::class,
        \App\Console\Commands\Collection\IvrTaskDispatch::class,
        \App\Console\Commands\Collection\IvrKeyPressEmail::class,
        \App\Console\Commands\Collection\IvrReportEmail::class,
        \App\Console\Commands\Collection\IvrSuccessStatics::class,
        \App\Console\Commands\Collection\HandTaskExecute::class,
        \App\Console\Commands\Collection\ActionDateInit::class,
        \App\Console\Commands\Collection\PartnerIdInit::class,
        \App\Console\Commands\Call\IvrDial::class,
        \App\Console\Commands\Call\IvrDialExecute::class,
        \App\Console\Commands\Call\IvrCallBack::class,
        \App\Console\Commands\Stat\StatBase::class,
        \App\Console\Commands\Stat\SendDailyReport::class,
        \App\Console\Commands\Stat\SendGjjDailyReport::class,
        \App\Console\Commands\Loan\GetLoanStatus::class,
        \App\Console\Commands\Loan\LoanCalcConsole::class,
        Commands\Loan\RepayDetailConsole::class,
        Commands\Loan\LoanDetailConsole::class,
        Commands\Loan\ApplyLoanAgain::class,
        \App\Console\Commands\Report\XfdApply::class,
        \App\Console\Commands\Xifee\ReSendXifee::class,
        \App\Console\Commands\Xifee\SyncRateDetail::class,
        \App\Console\Commands\User\RoleToUser::class,
        \App\Console\Commands\Log\ReadLog::class,
        Commands\Tools\TelDetailImport::class,
        \App\Console\Commands\Call\CallRecordsUpload::class,
        \App\Console\Commands\Sld\SyncFlowStatus::class,
        \App\Console\Commands\Loan\BatchLoanDetail::class,
        \App\Console\Commands\Loan\SyncLoanStatus::class,
        \App\Console\Commands\Gjj\UpdateFlowStatus::class,
        \App\Console\Commands\Loan\SyncCashStatus::class,
        \App\Console\Commands\Collection\RemindRepayMail::class,
        \App\Console\Commands\Tools\UpApplySubmitTime::class,
        \App\Console\Commands\Call\SyncUsersFromRc::class,
        \App\Console\Commands\SyFraud::class,
        \App\Console\Commands\Stat\SendChangeNameSms::class,
        \App\Console\Commands\User\TestUserInfo::class,
        \App\Console\Commands\Tools\SyncCalldetailNo::class,
        Commands\Tools\UploadFileToApply::class,
        \App\Console\Commands\Kd\ReCreateLoan::class,
        \App\Console\Commands\Kd\ExceptionApplyProcessor::class,
        \App\Console\Commands\PosInsure::class,
        \App\Console\Commands\Insure::class,
        \App\Console\Commands\WatchQueues::class,
        \App\Console\Commands\Tools\OutputUserRoleRelation::class,
        \App\Console\Commands\Collection\CentralBankCreditAutoSms::class,
        \App\Console\Commands\LoanFailedFix::class,
        \App\Console\Commands\Tools\ImportZxdTeldetailFile::class,
        Commands\Product\Xd\ClearTodayUnfinishedApply::class,
        \App\Console\Commands\GetXiaoYingUid::class,
        \App\Console\Commands\Tools\ProductNotice::class,
        \App\Console\Commands\Tools\Fraud::class,
        \App\Console\Commands\QueueMonitor::class,
        \App\Console\Commands\Sld\PartnerLoanBalanceReport::class,
        \App\Console\Commands\Sld\RateDetailSync::class,
        \App\Console\Commands\Tools\SyncRemarks::class,
        \App\Console\Commands\Sld\DataFix::class,
        \App\Console\Commands\GjjExport::class,
        \App\Console\Commands\TelDeatil::class,
        \App\Console\Commands\GjjFiles::class,
        \App\Console\Commands\Call\UpdateCallRecordsUrl::class,
        \App\Console\Commands\PolicyManager\UpdatePolicyFileUrl::class,
        \App\Console\Commands\TrigerFraud::class,
        \App\Console\Commands\Rcdc\SyncCity::class,
        \App\Console\Commands\Rcdc\SyncProduct::class,
        \App\Console\Commands\Rcdc\SyncRefuseCode::class,
        \App\Console\Commands\Rcdc\SyncCheatInfo::class,
	    \App\Console\Commands\Stat\StatHourlyData::class,
        \App\Console\Commands\Stat\StatApprove::class,
        Commands\FileTypes\Sfq::class,
        Commands\FileTypes\Vj::class,
        Commands\FileTypes\Wzfq::class,
        Commands\FileTypes\Sld::class,
        Commands\FileTypes\Zxd::class,
        Commands\FileTypes\Pos::class,
        Commands\FileTypes\Gjj::class,
        Commands\FileTypes\Kd::class,
        Commands\FileTypes\Ykd::class,
        Commands\Gjj\FileFix::class,
	
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //拿原始的逾期队列数据,从zmq队列读逾期详情,只拿原始数据,不做后续处理
        $schedule->command('collection:getdata')
                ->cron('0 3-21 * * *');
        //m0案件拉取
        $schedule->command('collection:getm0data')
            ->cron('40 9 * * *');
        $schedule->command('api:getxiaoyinguid')
            ->cron('*/10 * * * *');
        
        //处理collection:getdata拿到的原始数据
        //众信贷的数据补充相关用户信息后入cases表,其他产品的数据直接入库
        //对每个催收队列,按照总额补齐的方式分发到催收员
        $schedule->command('collection:dispatchcase')
                ->cron('30 3-21 * * *');
        //m0案件分配
        $schedule->command('collection:dispatchm0case')
            ->cron('50 9 * * *');
        //催收系统自动发送短信
        $schedule->command('collection:autosendsms')
            ->cron('0 10 * * *');

        //M1案件15天后重新分配
        $schedule->command('collection:m1dispatchemail')
            ->cron('30 2 * * *');

        //PTP案件复核提醒邮件
        $schedule->command('collection:ptpnoticeemail')
            ->cron('0 */2 * * *');

        //统计数据计算Gjj - 停止51公积金日报发送
    //    $schedule->command('stat:statbase gjj')->dailyAt('01:00');

        //统计数据计算
        $schedule->command('stat:statbase')->dailyAt('22:30');
        //统计小赢优贷时报-每周工作日10:00到19:00每小时统计一次
        $schedule->command('stat:hourlydata')->cron('0 10-19 * * 1-5');

        //日报发送 -- 停止51公积金日报发送
    //    $schedule->command('stat:sendgjjdailyreport')->dailyAt('01:10');
            //暂停日报发送,有数据团队发送日报
       // $schedule->command('stat:senddailyreport')->cron('45 22 * * 1-5');

        // 消费贷日报
        $schedule->command('report:xfdApply')
            ->cron('0 10,15,18 * * * *'); // 每天上午10点  下午3点 6点发

        //自动下载语音存储到七牛云
        $schedule->command('call:callRecordsUpload')
            ->cron('*/20 * * * *');
        
        //同步赎楼贷息费、还款状态
        $schedule->command('sld:syncflowstatus')
            ->cron('*/10 * * * *');

        //赎楼贷放款余量日报，每天24点
        $schedule->command('sld:partnerloanbalancereport')
            ->cron('0 0 * * *');

        //放款状态同步
        $schedule->command('loan:syncloanstatus')
            ->cron('* * * * *');

        //查询公积金驳回状态
        $schedule->command('gjj:updateflowstatus')->hourly();

        //提现状态同步
        $schedule->command('loan:synccashstatus')
            ->cron('* * * * *');
    
        //每天早上9点,发送上月逾期客户还款提醒邮件
        $schedule->command('collection:remindRepayMail')
            ->cron('0 9 * * *');

        //每天早上几点发送央行写征信自动短信
        $schedule->command('collection:centralbankcreditautosms')
            ->cron('0 9 * * *');

        //续贷产品每天24点需要过期掉当天的续贷案件
        $schedule->command('product:xd_clear')
            ->cron('0 0 * * *');

        #用户通话详单文件入库
        //$schedule->command('tools:ImportZxdTeldetailFile')
            //->cron('* 0,1,2,3,4,5,6,7,22,23 * * *');
        
        //催收平台ivr外呼任务调度
        $schedule->command('collection:ivr_task_dispatch')
            ->cron('* * * * *');
        
        //催收平台ivr响应邮件
        $schedule->command('collection:ivr_key_press_email')
            ->cron('* * * * *');
        
        //ivr呼叫
        $schedule->command('call:ivr_dial')
            ->cron('* * * * *');
        
        //ivr回调
        $schedule->command('call:ivr_call_back')
            ->cron('* * * * *');
        
        //ivr成功数统计
        $schedule->command('collection:ivr_success_statics')
            ->cron('*/5 * * * *');
        
        //ivr日报
        //$schedule->command('collection:ivr_report_email')
          //  ->dailyAt('10:20');

        // 队列长度监控任务
        $schedule->command('queue:monitor')
            ->everyFiveMinutes();

        // 更新录音文件地址每小时
        $schedule->command('call:updateCallRecordsUrl')
            ->hourly();
        // 更新政策文档地址每小时
        $schedule->command('policymanager:updatePolicyFileUrl')
            ->hourly();


		//===== Rcdc公共信息同步 start ======

		//欺诈规则
        $schedule->command('Rcdc:SyncCheatInfo')
            ->cron('0 12,21 * * * *'); // 每天中午12点 晚上9点同步 
		//城市
        $schedule->command('Rcdc:SyncCity')
            ->cron('5 12,21 * * * *'); // 每天中午12点 晚上9点 5分同步 
		//产品
        $schedule->command('Rcdc:SyncProduct')
            ->cron('10 12,21 * * * *'); // 每天中午12点 晚上9点 10分同步 
		//拒绝代码
        $schedule->command('Rcdc:SyncRefuseCode')
            ->cron('15 12,21 * * * *'); // 每天中午12点 晚上9点 15分同步 

		//===== Rcdc公共信息同步 end ======


    }
}
