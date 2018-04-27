                                <div class="form-group">
                                    <label class="col-md-2 control-label">录入人</label>
                                    <div class="col-md-5">
                                        <input type="text" value="{{ \App\Helpers\SystemHelper::showEditor($item['Document']) }}" class="form-control" readonly="readonly" />
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">录入时间</label>
                                    <div class="col-md-5">
                                        <input type="text" value="{{ !empty($item['Document']['updated_at']) ? \App\Helpers\DateHelper::peiking($item['Document']['updated_at']) : '' }}" class="form-control" readonly="readonly" />
                                    </div>
                                </div>