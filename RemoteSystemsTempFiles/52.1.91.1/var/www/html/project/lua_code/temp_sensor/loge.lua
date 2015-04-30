local z=...
print("ln : "..z)


--resol: number of iterations in the sum, default 20
local sum=0
if (not resol) then resol = 20000 end
for n=0,resol do
    sum = sum + (1/(2*n+1))*((z-1)/(z+1))^(2*n+1)
end
return 2*sum