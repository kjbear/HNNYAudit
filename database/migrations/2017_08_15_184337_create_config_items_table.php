<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('config_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cmdb_id');
            $table->string('global_id');
            $table->string('name');
            $table->string('display_label');
            $table->string('type_label');
            $table->string('host_osintsalltype')->nullable();
            $table->string('os_description')->nullable();
            $table->string('dns_servers')->nullable();
            $table->string('domain_name')->nullable();
            $table->boolean('agent_deployed')->nullable();
            $table->string('nt_registrationorg')->nullable();
            $table->string('TenantOwner')->nullable();
            $table->string('data_source')->nullable();
            $table->string('discovered_model')->nullable();
            $table->string('host_last_boot_time')->nullable();
            $table->integer('nt_processorsnumber')->nullable();
            $table->string('discovered_os_name')->nullable();
            $table->string('TennantUses')->nullable();
            $table->string('discovered_os_vendor')->nullable();
            $table->string('node_role')->nullable();
            $table->string('host_key')->nullable();
            $table->string('vendor')->nullable();
            $table->string('monitoring_tier')->nullable();
            $table->ipAddress('default_gateway_ip_address')->nullable();
            $table->string('os_vendor')->nullable();
            $table->dateTimeTz('last_modified_time')->nullable();
            $table->string('data_changestate')->nullable();
            $table->string('primary_dns_name')->nullable();
            $table->string('serial_number')->nullable();
            $table->string('nt_physicalmemory')->nullable();
            $table->string('discoverd_os_version')->nullable();
            $table->string('swap_memory_size')->nullable();
            $table->string('node_type')->nullable();
            $table->string('default_gateway_ip_address_type')->nullable();
            $table->string('host_osrelease')->nullable();
            $table->dateTimeTz('create_time')->nullable();
            $table->boolean('Pingable')->nullable();
            $table->string('discovered_vendor')->nullable();
            $table->string('os_architecture')->nullable();
            $table->string('root_class')->nullable();
            $table->string('data_updated_by')->nullable();
            $table->string('os_family')->nullable();
            $table->string('nt_servicepack')->nullable();
            $table->string('memory_size')->nullable();
            $table->string('host_iscomplete')->nullable();
            $table->string('node_model')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config_items');
    }
}
